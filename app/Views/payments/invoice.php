<?= $this->extend('layouts_dev/master_user') ?>
<?= $this->section('content') ?>
<?php #dd($students);

use phpDocumentor\Reflection\DocBlock\Description;

$student_nis = $students['nis'];
$student_name = $students['name'];
$student_email = $students['email'];
$student_username = $students['username'];
$student_address = $students['address'];
$student_city = $students['city'];
$student_phone = $students['phone'];
$student_no_invoice = $students['no_invoice'];
$student_status = $students['status'];
$student_created_at = $students['created_at'];
$student_updated_at = $students['updated_at'];
$student_group_id = $students['group_id'];
$payment_package = $students['payment']['package'];
$payment_adm = $students['payment']['adm'];
$payment_adf = $students['payment']['adf'];
$payment_tuition = $students['payment']['tuition'];
$payment_uniform = $students['payment']['uniform'];
$payment_books = $students['payment']['books'];
$group_description = $students['group']->description;
$group_name = $students['group']->name;

$balance_due = $payment_adm + $payment_adf + $payment_tuition + $payment_uniform + $payment_books;
$adm_txt = "Rp" . number_format($payment_adm, 2);
$adf_txt = "Rp" . number_format($payment_adf, 2);
$tuition_txt = "Rp" . number_format($payment_tuition, 2);
$uniform_txt = "Rp" . number_format($payment_uniform, 2);
$books_txt = "Rp" . number_format($payment_books, 2);
$balance_due_txt = "Rp" . number_format($balance_due, 2);
?>
<div class="col-md-10 my-2" style="background: white; border-radius: 19px;">
    <div class="right_col my-3 mx-1" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>KIDS REPUBLIC PRIMARY SCHOOL INVOICE</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <section class="content invoice">
                                <br />
                                <!-- info row 1 -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Childs Name
                                        <br />
                                        <strong><?= ucfirst($student_name) ?></strong>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Bill To
                                        <br />
                                        <strong>Parents of <?= ucfirst($student_name) ?></strong>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Invoice
                                        <br />
                                        <strong><?= $student_no_invoice ?></strong>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <br />
                                <!-- info row 2 -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Class
                                        <br />
                                        <strong><?= ucfirst($group_name) ?></strong>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Academic Year
                                        <br />
                                        <strong>2020/2021</strong>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Payment Details
                                        <br />
                                        <strong>Registration</strong>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <br />
                                <!-- Table row -->
                                <div class="row no-print">
                                    <div class="col-xs-12">
                                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 table">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Admission Fee</td>
                                                    <td><?= $adm_txt ?></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Annual Development Fee</td>
                                                    <td><?= $adf_txt ?></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Uniform</td>
                                                    <td><?= $uniform_txt ?></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Tuition Fee</td>
                                                    <td><?= $tuition_txt ?></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Books</td>
                                                    <td><?= $books_txt ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><b>Total</b></td>
                                                    <!-- <td>422-568-642</td> -->
                                                    <!-- <td>Tousled lomo letterpress erry Richardson helvetica tousled street art master helvetica tousled street art master, El snort testosterone</td> -->
                                                    <td><b><?= $balance_due_txt ?></b></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <td></td>
                                                <td><strong>Amount: Satu Juta Delapan Ratus Ribu</strong></td>
                                                <td></td>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-6">
                                        <p class="well well-sm no-shadow text-white" style="margin-top: 10px; background-color: #5bc0de;">
                                            Pembayaran Dapat Di Transfer Ke No.Rek <b>Bank Syariah Mandiri</b> : <i>7-222-666-893</i> | A.n: <b>Kids Republic Primary School</b>
                                        </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-6">
                                        <!-- <p class="lead" style="text-align: center;">Jakarta, 27 November 2020</p>
                                        <h4 style="text-align: center;">Finance</h4>
                                        <img
                                            src="<?= base_url('assets/gentelella/images/finance_signature.PNG') ?>"
                                            alt="Girl in a jacket"
                                            width="191"
                                            height="98"
                                            style="vertical-align: middle; display: block; margin-left: auto; margin-right: auto;"
                                        />
                                        <h4 style="text-align: center;">
                                            <b>(<u>Susi Handayani</u>)</b>
                                        </h4> -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row" style="border-top: 2px solid #e6e9ed; color: black; text-align: center;">
                                    <div class="col-md-6 offset-md-3 my-4">
                                        <h5><strong>Note: PEMBAYARAN DILAKUKAN SEBELUM JATUH TEMPO TANGGAL 10 MOHON ABAIKAN INVOICE INI APABILA TELAH MELAKUKAN PEMBAYARAN.</strong></h5>
                                        <br />
                                        <b>
                                            Yayasan Batin Cahaya Bangsa <br />
                                            Jl. Cipinang Bali 1. Kel. Cipinang Muara, Kec. Jatinegara, Jakarta Timur 13420 <br />
                                            Telp: <a href="tel:+6221-850-2050">021-8502050</a> / <a href="tel:+6221-298-7245">021-29827245</a> / <a href="tel:+62821-200-77-600">0821 200 77 600</a> <br />
                                            <u><a href="mailto:info@kidsrepublic.sch.id">info@kidsrepublic.sch.id</a></u> / <u><a href="mailto:finance@kidsrepublic.co.id">finance@kidsrepublic.co.id</a></u> |
                                            <u><a href="<? base_url('') ?>">www.kidsrepublic.sch.id</a></u>
                                        </b>
                                    </div>
                                </div>
                                <br />
                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-xs-12">
                                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                        <!-- <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                  <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button> -->
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>