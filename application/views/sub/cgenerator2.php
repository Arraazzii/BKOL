<?php
        $idjenisuser = $this->session->userdata('idjenisuser');
        if ($idjenisuser == "000000")
        {
                if ($route == "ubahsandi")
                {
                        $this->load->view('admin/ubahsandi');
                }
                else if ($route == "newpencaker")
                {
                        $this->load->view('admin/newpencaker');
                }
                else if ($route == "chat")
                {
                        $this->load->view('admin/chat');
                }
                else if ($route == "newperusahaan")
                {
                        $this->load->view('admin/newperusahaan');
                }
                else if ($route == "pencaker")
                {
                        $this->load->view('admin/daftar_pencaker');
                }
                else if ($route == "pencaker/cekaktivasi")
                {
                        $this->load->view('admin/daftar_aktivasipencaker');
                }
                else if ($route == "pencaker/lowongan")
                {
                        $this->load->view('admin/pencaker/daftar_lowongan');
                }
                else if ($route == "perusahaan")
                {
                        $this->load->view('admin/daftar_perusahaan');
                }
                else if ($route == "perusahaan/lowongan")
                {
                        $this->load->view('admin/perusahaan/daftar_lowongan');
                }
                else if ($route == "perusahaan/lowongan/tambahdata")
                {
                        $this->load->view('admin/perusahaan/tambah_lowongan');
                }
                else if ($route == "perusahaan/lowongan/detail")
                {
                        $this->load->view('admin/perusahaan/profil_lowongan');
                }
                else if ($route == "perusahaan/detail")
                {
                        $this->load->view('admin/profil_perusahaan');
                }
                else if ($route == "lowongan")
                {
                        $this->load->view('admin/daftar_lowongan');
                }
                else if ($route == "kabupaten")
                {
                        $this->load->view('admin/daftar_kabupaten');
                }
                else if ($route == "kecamatan")
                {
                        $this->load->view('admin/daftar_kecamatan');
                }
                else if ($route == "kelurahan")
                {
                        $this->load->view('admin/daftar_kelurahan');
                }
                else if ($route == "posisijabatan")
                {
                        $this->load->view('admin/daftar_posisijabatan');
                }
                else if ($route == "jurusan")
                {
                        $this->load->view('admin/daftar_jurusan');
                }
                else if ($route == "jenislowongan")
                {
                        $this->load->view('admin/daftar_jenislowongan');
                }
                else if ($route == "keahlian")
                {
                        $this->load->view('admin/daftar_keahlian');
                }
                else if ($route == "berita")
                {
                        $this->load->view('admin/daftar_berita');
                }
                else if ($route == "berita/foto")
                {
                        $this->load->view('admin/foto_berita');
                }
                else if ($route == "event")
                {
                        $this->load->view('admin/daftar_event');
                }
                else if ($route == "event/foto")
                {
                        $this->load->view('admin/foto_event');
                }
                else if ($route == "persyaratan")
                {
                        $this->load->view('master/persyaratan');
                }
                else if ($route == "statistik")
                {
                        $this->load->view('master/statistik');
                }
                else if ($route == 'lap_penempatan')
                {
                        $this->load->view('admin/lap_penempatan');
                }
                else
                {
                        $this->load->view('admin/newpencaker');
                }
        }
        else if ($idjenisuser == "000001")
        {
                if ($route == "ubahsandi")
                {
                        $this->load->view('perusahaan/ubahsandi');
                }else if ($route == "chat")
                        {
                        $this->load->view('pencaker/chat');
                        }
                else if ($route == "edit")
                {
                        $this->load->view('perusahaan/profil_edit2');
                }
                else if ($route == "pemberikerja")
                {
                        $this->load->view('perusahaan/profil_pemberikerja');
                }
                else if ($route == "pemberikerja/edit")
                {
                        $this->load->view('perusahaan/profil_pemberikerja_edit2');
                }
                else if ($route == "pencaker")
                {
                        $this->load->view('perusahaan/daftar_pencaker');
                }
                else if ($route == "lowongan")
                {
                        $this->load->view('perusahaan/daftar_lowongan');
                }
                else if ($route == "lowongan/tambahdata")
                {
                        $this->load->view('perusahaan/tambah_lowongan2');
                }
                else if ($route == "lowongan/detail")
                {
                        $this->load->view('perusahaan/profil_lowongan');
                }
                else if ($route == "statuslowongan")
                {
                        $this->load->view('perusahaan/daftar_statuslowongan');
                }
                else if ($route == "persyaratan")
                {
                        $this->load->view('master/persyaratan');
                }
                else if ($route == "statistik")
                {
                        $this->load->view('master/statistik');
                }
                else if ($route == "persyaratan")
                {
                        $this->load->view('master/persyaratan');
                }
                else if ($route == "statistik")
                {
                        $this->load->view('master/statistik');
                }
                else if ($route == "persyaratan")
                {
                        $this->load->view('master/persyaratan');
                }
                else if ($route == "statistik")
                {
                        $this->load->view('master/statistik');
                }
                else
                {
                        $this->load->view('perusahaan/profil');
                }
        }
        else if ($idjenisuser == "000002")
        {
                $aktif = $this->session->userdata('aktif');
                if ($route == "persyaratan")
                {
                        $this->load->view('master/persyaratan');
                }
                else if ($route == "statistik")
                {
                        $this->load->view('master/statistik');
                }
                else if ($aktif)
                {
                        if ($route == "ubahsandi")
                        {
                                $this->load->view('pencaker/ubahsandi');
                        }
                        else if ($route == "edit")
                        {
                                $this->load->view('pencaker/profil_edit2');
                        }
                        else if ($route == "chat")
                        {
                                $this->load->view('pencaker/chat');
                        }
                        else if ($route == "editcv")
                        {
                                $this->load->view('pencaker/profil_editcv');
                        }
                        else if ($route == "editbahasa")
                        {
                                $this->load->view('pencaker/profil_editbahasa');
                        }
                        else if ($route == "editpengalaman")
                        {
                                $this->load->view('pencaker/profil_editpengalaman');
                        }
                        else if ($route == "lowongan")
                        {
                                $this->load->view('pencaker/daftar_lowongan');
                        }
                        else if ($route == "perusahaan")
                        {
                                $this->load->view('pencaker/daftar_perusahaan');
                        }
                        else
                        {
                                $this->load->view('pencaker/profil');
                        }
                }
                else
                {
                        $this->load->view('pencaker/activation');
                }
        }
        else
        {
                if ($route == "dataperusahaan")
                {
                        $this->load->view('master/daftar_perusahaan');
                }
                else if ($route == "datapencaker")
                {
                        $this->load->view('master/daftar_pencaker');
                }
                else if ($route == "datalowongan" || $route == "kategori")
                {
                        $this->load->view('master/daftar_lowongan');
                }
                else if ($route == "persyaratan")
                {
                        $this->load->view('master/persyaratan');
                }
                else if ($route == "statistik")
                {
                        $this->load->view('master/statistik');
                }
                else if ($route == "register")
                {
                        $mode = $this->uri->segment(2);
                        if ($mode == "")
                        {
                                $this->load->view('master/register2');
                        }
                        else if ($mode == "1")
                        {
                                $this->load->view('perusahaan/register2');
                        }
                        else if ($mode == "2")
                        {
                                $this->load->view('pencaker/register2');
                        }
                }
                else if ($route == "login")
                {
                        $this->load->view('master/login2');
                }
                else if ($route == "admin")
                {
                        $this->load->view('admin/login');
                }
                else if ($route == "lupasandi")
                {
                        $this->load->view('master/lupasandi');
                }
                else if ($route == "berita")
                {
                        $this->load->view('master/daftarberita');
                }
                else if ($route == "berita/view")
                {
                        $this->load->view('master/view_berita');
                }
                else if ($route == "event")
                {
                        $this->load->view('master/daftarevent');
                }
                else if ($route == "event/view")
                {
                        $this->load->view('master/view_event');
                }
                else
                {
                        $this->load->view('master/content2');
                }
        }
?>