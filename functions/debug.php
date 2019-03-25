<?php

function cl ($data) {
  echo '<script>';
  echo 'console.log("PHP", '. json_encode( $data ) .')';
  echo '</script>';
}
