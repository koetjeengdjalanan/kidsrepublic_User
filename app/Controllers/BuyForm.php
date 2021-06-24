<?php

namespace App\Controllers;

use \App\Models\BuyFormModel;

class BuyForm extends BaseController
{
    protected $buyForm;

    public function __construct()
    {
        // parent::__construct();
        $this->email_smtp   = \Config\Services::email();
        $this->buyForm      = new BuyFormModel();
    }

    public function GetAnno()
    {
        $to_mail = $this->request->getVar('email_anno');
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr(str_shuffle($permitted_chars), 0, 8);
        $this->email_smtp->setFrom("noreply@kidsrepublic.sch.id", "Kids Republic");
        $this->email_smtp->setTo($to_mail);
        $this->email_smtp->setSubject('Hi From Kids Republic');
        $this->email_smtp->setMessage('Use This token ' . $token);
        if ($this->email_smtp->send()) {
            $data = [
                'email' => $to_mail,
                'token' => $token
            ];
            $this->buyForm->insert($data);
            return redirect()->to('/');
        } else {
            $data = $this->email_smtp->printDebugger(['headers']);
            print_r($data);
        }
    }

    public function inv_upload()
    {
        $validated = $this->validate([
            'invoice' => [
                'uploaded[invoice]',
                'mime_in[invoice,application/pdf,image/jpg,image/jpeg,image/png]',
                'max_size[invoice,4096]'
            ],
        ]);
        $msg_type = 'wrong';
        $msg = 'Format File Salah';
        if ($validated) {
            $files = $this->request->getFile('invoice');
            $token = $this->request->getVar('token');
            if ($files->getError() != 4) {
                $files_ext = $files->getExtension();
                $fileName = $token . "." . $files_ext;
                $dir_path = 'assets/upload/invoice/';
                $formFiles = $this->buyForm->select('invoice')->where('token', $token)
                    ->first();
                if ($formFiles["invoice"]) unlink($dir_path . $fileName);
                $files->move($dir_path, $fileName);
            }
            $formfile_data = [
                'token' => $token,
                'invoice' => $fileName,
                'status' => 1
            ];
            $save = $this->buyForm->where("token", $token)->set($formfile_data)->update();
            if ($save) {
                $msg_type = 'success';
                $msg = 'File Berhasil diupload';
            }
        }
        session()->setFlashdata($msg_type, $msg);
        return redirect()->to(base_url('user/schoolrecommendation'));
    }
}

/* End of file Controllername.php */
