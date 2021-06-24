<?php

namespace App\Controllers;

use \App\Models\FormFileModel;
use \App\Models\StudentDetailModel;
use \App\Models\InvoiceStatusModel;

class UserUpload extends BaseController
{
    protected $user_id;
    protected $formfile;
    protected $studentDetail;
    protected $invoiceStatus;

    public function __construct()
    {
        $this->user_id  = user()->id;
        $this->formfile = new FormFileModel();
        $this->studentDetail = new StudentDetailModel();
        $this->invoiceStatus = new InvoiceStatusModel();
    }

    public function do_upload()
    {
        $validated = $this->validate([
            'userschool' => [
                'uploaded[userschool]',
                'mime_in[userschool,application/pdf]',
                'max_size[userschool,2048]'
            ],
        ]);
        $msg_type = 'wrong';
        $msg = 'Format File Salah';
        if ($validated) {
            $files                   = $this->request->getFile('userschool');
            $old_file                = $this->request->getVar('old_file');
            $formfiles = $this->formfile->getFormFile($this->user_id);
            if ($files->getError() == 4) {
                $fileName = $old_file;
            } else {
                $student_details_data = $this->studentDetail->getStudentDetail(NULL, $this->user_id);
                $student_name = $student_details_data['name'];
                $seed = (int) $student_name;
                srand($seed);
                $fileName = 'sr_' . $student_name . "_" . rand() . ".pdf";
                $dir_path = 'assets/upload/doc/';
                if ($old_file != null) unlink($dir_path . $old_file);
                $files->move($dir_path, $fileName);
            }
            $formfile_data = [
                'users_id' => $this->user_id,
                'prevschool' => $fileName
            ];
            if ($formfiles) {
                $formfile_id = $formfiles['id'];
                $this->formfile->where("id", $formfile_id)->set($formfile_data)->update();
            } else {
                $this->formfile->save($formfile_data);
            }
            $msg_type = 'success';
            $msg = 'File Berhasil diupload';
        }
        session()->setFlashdata($msg_type, $msg);
        return redirect()->to(base_url('user/schoolrecommendation'));
    }

    public function receipt()
    {
        # code...
        $validated = $this->validate([
            'userschool' => [
                'uploaded[userschool]',
                'mime_in[userschool,application/pdf,image/png,image/jpg]',
                'max_size[userschool,2048]'
            ],
        ]);
        $msg_type = 'wrong';
        $msg = 'Format File Salah';
        if ($validated) {
            $files                   = $this->request->getFile('userschool');
            $old_file                = $this->request->getVar('old_file');
            if ($files->getError() == 4) {
                $fileName = $old_file;
            } else {
                $student_details_data = $this->studentDetail->getStudentDetail(NULL, $this->user_id);
                $formfiles = $this->formfile->getFormFile($this->user_id);
                $student_name = $student_details_data['name'];
                $student_nis = $student_details_data['nis'];
                // $seed = (int) $student_name;
                // srand($seed);
                $fileName = 'invoice_' . $student_name . "_" . $files->getRandomName();
                // $fileName = 'invoice_' . $student_name . "_" . rand() . ".pdf";
                $dir_path = 'assets/upload/invoice/endinvoice/';
                if ($old_file != null) unlink($dir_path . $old_file);
                $files->move($dir_path, $fileName);
            }
            $formfile_data = [
                'users_id' => $this->user_id,
                'invoice' => $fileName
            ];
            if ($formfiles) {
                $formfile_id = $formfiles['id'];
                $this->formfile->where("id", $formfile_id)->set($formfile_data)->update();
            } else {
                $this->formfile->save($formfile_data);
            }
            $this->invoiceStatus->where('student_nis', $student_nis)->set('status', 2)->update();
            $msg_type = 'success';
            $msg = 'File Berhasil diupload';
        }
        session()->setFlashdata($msg_type, $msg);
        return redirect()->to(base_url('user/receipt'));
    }

    public function download($prevschool)
    {
        return $this->response->download(WRITEPATH . 'upload/doc/' . $prevschool);
    }
}
