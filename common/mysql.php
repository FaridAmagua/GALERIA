<?php
    function Connect($config = array())
    {
        $conn = mysqli_connect( $config['host'],$config['username'],$config['password'],$config['database']);
        mysqli_set_charset($conn, $config['enconding']);
        return( $conn);
    }

    function Execute($sql, $conn)
    {
        $retun = mysqli_query( $conn,$sql);
        return($retun);
    }


  function ExecuteQuery( $sql, $conn) 
  {      

    $result = mysqli_query( $conn, $sql);
    if  ( $row = mysqli_fetch_array( $result, MYSQLI_BOTH)) 
    {
      do 
      {   
        $data[] = $row;
      }
      while ( $row = mysqli_fetch_array( $result, MYSQLI_BOTH));
    }
    else 
    {
      $data = null;
    }

    mysqli_free_result( $result);
    return ( $data);

  }

  function Close( $conn) 
  {
    mysqli_close( $conn);
    unset ( $conn);
  } ($conn);