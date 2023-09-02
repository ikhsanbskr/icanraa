<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelNotifikasi;
use App\Models\ModelPemasukan;
use App\Models\ModelSaldo;
use GuzzleHttp\Client;

class API extends BaseController
{
  protected $modelPemasukan, $modelNotif, $id_vera, $id_ikhsan, $onesignal_app_id, $onesignal_api_key;
  public function __construct()
  {
    $this->modelPemasukan = new ModelPemasukan();
    $this->modelNotif = new ModelNotifikasi();
    $this->id_ikhsan = '94f32f4d-f471-44af-a8a4-18288043011e';
    $this->id_vera = '3201dsadsa';
    $this->onesignal_app_id = '822ce939-c793-4412-9b06-69530f71fe99';
    $this->onesignal_api_key = 'N2I4ODJkMWUtODE5MC00NWYwLWI2NDItYWZmNGZiNmRkZTRj';
  }

  public function notification()
  {
    $pemasukan_ikhsan = $this->modelPemasukan->where('tgl_pemasukan', date('Y-m-d'))
      ->where('id_user', '1')
      ->countAllResults();

    $pemasukan_vera = $this->modelPemasukan->where('tgl_pemasukan', date('Y-m-d'))
      ->where('id_user', '2')
      ->countAllResults();

    $pesan = 'Alooo jangan lupa nabung yaa hari ini!';

    if ($pemasukan_ikhsan == 0) {
      $this->modelNotif->insert([
        'pesan' => $pesan,
        'tanggal' => date('Y-m-d'),
        'status'  => 1,
        'user_id' => 1
      ]);

      $content = array(
        "en" => $pesan
      );

      $headings = array(
        "en" => "Icanraa"
      );

      $include_players_ids = [
        $this->id_ikhsan
      ];

      $fields = array(
        'app_id' => $this->onesignal_app_id,
        // 'included_segments' => array('All'),
        'include_player_ids' => $include_players_ids,
        'contents' => $content,
        'headings' => $headings
      );

      $headers = array(
        'Authorization: Basic ' . $this->onesignal_api_key,
        'Content-Type: application/json'
      );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications');
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

      $response = curl_exec($ch);
      curl_close($ch);
    }

    if ($pemasukan_vera == 0) {
      $this->modelNotif->insert([
        'pesan' => $pesan,
        'tanggal' => date('Y-m-d'),
        'status'  => 1,
        'user_id' => 2
      ]);

      $content = array(
        "en" => $pesan
      );

      $headings = array(
        "en" => "Icanraa"
      );

      $include_players_ids = [
        $this->id_vera
      ];

      $fields = array(
        'app_id' => $this->onesignal_app_id,
        // 'included_segments' => array('All'),
        'include_player_ids' => $include_players_ids,
        'contents' => $content,
        'headings' => $headings
      );

      $headers = array(
        'Authorization: Basic ' . $this->onesignal_api_key,
        'Content-Type: application/json'
      );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications');
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

      $response = curl_exec($ch);
      curl_close($ch);
    }
  }
}
