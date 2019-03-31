<?php
  switch ($page) {

    default:
        $say    =  Helpers::DB();Config::get('database.connections.sqlsrv');
        return view('ex.kbv.dashboard',compact('say'));
      break;
  }
?>
