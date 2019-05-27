<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//Umum
$route['default_controller'] = "root";
$route['admin'] = "admin";
$route['updatewebstatistic'] = "root/updatewebstatistic";
$route['getwebstatistic'] = "root/getwebstatistic";
$route['dataperusahaan(.*)'] = "root/dataperusahaan$1";
$route['datapencaker(.*)'] = "root/datapencaker$1";
$route['datalowongan(.*)'] = "root/datalowongan$1";
$route['berita(.*)'] = "root/berita$1";
$route['event(.*)'] = "root/event$1";
$route['kategori'] = "root/kategori";
$route['persyaratan'] = "root/persyaratan";
$route['persyaratan/1'] = "root/persyaratan/1";
$route['persyaratan/2'] = "root/persyaratan/2";
$route['statistik(.*)'] = "root/statistik$1";
$route['register/(1|2)'] = "root/register/$1";
$route['login'] = "login";
$route['logout'] = "login/dologout";
$route['lupasandi'] = "root/lupasandi";
$route['ubahsandi'] = "root/ubahsandi";
$route['detailLowonganPekerjaan'] = "root/LowonganPekerjaan";

$route['api_lowongan'] = "root/api_lowongan";

$route['GetKelurahan(.*)'] = "root/GetKelurahan$1";
$route['GetKeahlian(.*)'] = "root/GetKeahlian$1";

$route['frontend'] = "root/frontend";

//Admin
$route['admin/newperusahaan(.*)'] = "admin/newperusahaan$1";
$route['admin/newpencaker(.*)'] = "admin/newpencaker$1";

$route['admin/perusahaan(.*)'] = "admin/perusahaan$1";
$route['admin/pencaker(.*)'] = "admin/pencaker$1";

$route['admin/jabatan(.*)'] = "admin/jabatan$1";
$route['admin/jurusan(.*)'] = "admin/jurusan$1";
$route['admin/keahlian(.*)'] = "admin/keahlian$1";

$route['admin/berita(.*)'] = "admin/berita$1";
$route['admin/event(.*)'] = "admin/event$1";
$route['admin/lap_penempatan(.*)'] = "admin/lap_penempatan$1";

$route['admin/exportpencakertemp(.*)'] = "admin/exportpencakertemp$1";
$route['admin/deletepencakertemp(.*)'] = "admin/deletepencakertemp$1";
$route['admin/exportperusahaantemp(.*)'] = "admin/exportperusahaantemp$1";
$route['admin/deleteperusahaantemp(.*)'] = "admin/deleteperusahaantemp$1";

//Perusahaan
$route['pemberikerja(.*)'] = "perusahaan/pemberikerja$1";
$route['statuslowongan'] = "perusahaan/statuslowongan";
$route['perusahaan/lowongan(.*)'] = "perusahaan/lowongan$1";
$route['perusahaan/tambahdatalowongan'] = "perusahaan/lowongan/tambahdata";
$route['perusahaan/addlowongan(.*)'] = "perusahaan/addlowongan$1";
$route['perusahaan/deletelowongan(.*)'] = "perusahaan/deletelowongan$1";

//Pencaker
$route['pencaker/lowongan(.*)'] = "pencaker/lowongan$1";
$route['pencaker/perusahaan(.*)'] = "pencaker/perusahaan";
$route['pencaker/chat(.*)'] = "pencaker/chat";

//Mail
$route['mail'] = "mail";

$route['404_override'] = "";


/* End of file routes.php */
/* Location: ./application/config/routes.php */