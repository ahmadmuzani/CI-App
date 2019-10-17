<?php  

class Mahasiswa extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }

    public function index(){
        // $data ['mahasiswa'] = [
        //     [
        //     'nama' => 'Ahmad Muzani',
        //     'nrp' => '163040082',
        //     'email' => 'ahmad.muzani@mail.unpas.ac.id',
        //     'jurusan' => 'Teknik Informatika'
        //     ],
        //     [
        //         'nama' => 'Rangga',
        //         'nrp' => '163040083',
        //         'email' => 'rangga@mail.unpas.ac.id',
        //         'jurusan' => 'Teknik Informatika'
        //     ]
        // ];
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getAllMahasiswa();
        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
        // $this->load->model('Mahasiswa_model', 'mhs');
        // $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        // $this->load->view('mahasiswa/index', $data);
    }
    public function tambah(){
        $data['judul']='Form Tambah Data Mahasiswa';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        }else {
            $this->mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('mahasiswa');
        }
    }


}


?>