<?php
session_start();
if(isset($_SESSION['guncuber_id']) === TRUE && isset($_SESSION['guncuber_sei']) === TRUE && isset($_SESSION['guncuber_mei']) === TRUE) {
  $session_id = $_SESSION['guncuber_id'];
  $session_sei = $_SESSION['guncuber_sei'];
  $session_mei = $_SESSION['guncuber_mei'];
}
