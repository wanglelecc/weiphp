<?php
namespace app\weiapp\controller;
use \think\Controller;
class SocketTest extends Controller
{
    public function index()
    {
    	return $this->fetch();
    }
}
