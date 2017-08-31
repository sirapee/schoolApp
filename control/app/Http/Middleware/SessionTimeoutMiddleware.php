<?php namespace App\Http\Middleware;
use Closure;
use Sentinel;
use Illuminate\Session\Store;
class SessionTimeoutMiddleware {
    protected $session;
    protected $timeout=900;
    protected $locksScreenTimeout=300;
    public function __construct(Store $session){
        $this->session=$session;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->path() != 'userLogin' && $request->path() != 'userLogout'){
            if(!$this->session->has('lastActivityTime'))
                $this->session->put('lastActivityTime',time());
            elseif(time() - $this->session->get('lastActivityTime') > $this->getTimeOut()){
                $this->session->forget('lastActivityTime');
                Sentinel::logout();
                return redirect('userLogin')->withErrors(['You had not activity in 15 minutes']);
            }elseif(time() - $this->session->get('lastActivityTime') > $this->getLockScreenTimeOut()){
                $this->session->forget('lastActivityTime');
                $username = Sentinel::getUser()->username;
                return redirect('lockScreen')->with(['warning'=>'You had not activity in 5 minutes','username' => $username]);
            }
        }

        $this->session->put('lastActivityTime',time());
        return $next($request);
    }

    protected function getTimeOut()
    {
        return (env('TIMEOUT')) ?: $this->timeout;
    }
    protected function getLockScreenTimeOut()
    {
        return (env('LOCKSCREEN')) ?: $this->locksScreenTimeout;
    }
}