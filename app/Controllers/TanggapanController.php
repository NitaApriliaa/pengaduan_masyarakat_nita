<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
class TanggapanController extends BaseController{

 protected $tanggapans,$pengaduans;
 public function __construct()
 {
    $this->pengaduans= new Pengaduan();
    $this->tanggapans= new Tanggapan();
 }
 public function save()
 {
    $data = array(
        'tgl_tanggapan'=>date('Y-m-d H:i:s'),
        'id_petugas'=>session()->get('id_petugas'),
        'tanggapan'=>$this->request->getPost('tanggapan'),
        'id_pengaduan'=>$this->request->getPost('id_pengaduan'),
    );
    $this->tanggapans->insert($data);
   $data2 = array(
    'status'=>session()->get('0','proses','selesai'),
   );
    return redirect('pengaduan');
 }
 public function getTanggapan()
 {
    $data = $this->tanggapans->where('id_pengaduan',$this->request->getGet('id_pengaduan'))->findAll();
    return response()->getJSON($data);
 }
}