<?= $this->extend('layouts_dev/master_admin') ?>
<?= $this->section('content') ?>
<div class="right_col" role="main">
    <h3>Enrolling and Payment Graph</h3>
    <div class="row">
        <div class="col-md-7 px-4 py-2">
            <div class="row">
                <div class="card col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">Pending Interview</h5>
                        <br />
                        <h1 class="text-right">1,254</h1>
                        <p class="card-text text-muted">Scheduled <span class="pl-5">534</span></p>
                    </div>
                </div>
                <div class="card col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            Pending <br />
                            Trial
                        </h5>
                        <h1 class="mt-3 text-right">809</h1>
                    </div>
                </div>
                <div class="card col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">Pending Enrollment</h5>
                        <h1 class="mt-3 text-right">114</h1>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="card col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            Pending Request <br />
                            Form
                        </h5>
                        <h3 class="card-subtitle mb-2 text-muted text-right">1,254</h3>
                    </div>
                </div>
                <div class="card col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            Elementary Student <br />
                            Quota
                        </h5>
                        <h3 class="card-subtitle mb-2 text-muted text-right">809</h3>
                    </div>
                </div>
                <div class="card col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            Primary Student <br />
                            Quota
                        </h5>
                        <h3 class="card-subtitle mb-2 text-muted text-right">114</h3>
                    </div>
                </div>
                <div class="card col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">Pending Enrollment Package</h5>
                        <h3 class="card-subtitle mb-2 text-muted text-right">27</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 py-3">
            <div class="x_content">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <div class="row px-3 table-responsive">
        <table class="table table-striped table-bordered" id="datatable-buttons" width="100%">
            <h3>Students Table</h3>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Enrolling Date</th>
                    <th>Last Seen</th>
                    <th>Status</th>
                    <th>Code</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ulla Kirgan</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tinder</td>
                    <td>$2,350.00</td>
                    <td>$2,350.00</td>
                </tr>
                <tr>
                    <td>Mariska Plaister</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tan Tan</td>
                    <td>$750.83</td>
                    <td>$750.83</td>
                </tr>
                <tr>
                    <td>Rikki Sommer</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Signal</td>
                    <td>$1,200.00</td>
                    <td>$1,200.00</td>
                </tr>
                <tr>
                    <td>Jdaive Morden</td>
                    <td>Male</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$2,500.00</td>
                    <td>$2,500.00</td>
                </tr>
                <tr>
                    <td>Victoria Candy</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$3,200.00</td>
                    <td>$3,200.00</td>
                </tr>
                <tr>
                    <td>Ulla Kirgan</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tinder</td>
                    <td>$2,350.00</td>
                    <td>$2,350.00</td>
                </tr>
                <tr>
                    <td>Mariska Plaister</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tan Tan</td>
                    <td>$750.83</td>
                    <td>$750.83</td>
                </tr>
                <tr>
                    <td>Rikki Sommer</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Signal</td>
                    <td>$1,200.00</td>
                    <td>$1,200.00</td>
                </tr>
                <tr>
                    <td>Jdaive Morden</td>
                    <td>Male</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$2,500.00</td>
                    <td>$2,500.00</td>
                </tr>
                <tr>
                    <td>Victoria Candy</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$3,200.00</td>
                    <td>$3,200.00</td>
                </tr>
                <tr>
                    <td>Ulla Kirgan</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tinder</td>
                    <td>$2,350.00</td>
                    <td>$2,350.00</td>
                </tr>
                <tr>
                    <td>Mariska Plaister</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tan Tan</td>
                    <td>$750.83</td>
                    <td>$750.83</td>
                </tr>
                <tr>
                    <td>Rikki Sommer</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Signal</td>
                    <td>$1,200.00</td>
                    <td>$1,200.00</td>
                </tr>
                <tr>
                    <td>Jdaive Morden</td>
                    <td>Male</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$2,500.00</td>
                    <td>$2,500.00</td>
                </tr>
                <tr>
                    <td>Victoria Candy</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$3,200.00</td>
                    <td>$3,200.00</td>
                </tr>
                <tr>
                    <td>Ulla Kirgan</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tinder</td>
                    <td>$2,350.00</td>
                    <td>$2,350.00</td>
                </tr>
                <tr>
                    <td>Mariska Plaister</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tan Tan</td>
                    <td>$750.83</td>
                    <td>$750.83</td>
                </tr>
                <tr>
                    <td>Rikki Sommer</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Signal</td>
                    <td>$1,200.00</td>
                    <td>$1,200.00</td>
                </tr>
                <tr>
                    <td>Jdaive Morden</td>
                    <td>Male</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$2,500.00</td>
                    <td>$2,500.00</td>
                </tr>
                <tr>
                    <td>Victoria Candy</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$3,200.00</td>
                    <td>$3,200.00</td>
                </tr>
                <tr>
                    <td>Ulla Kirgan</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tinder</td>
                    <td>$2,350.00</td>
                    <td>$2,350.00</td>
                </tr>
                <tr>
                    <td>Mariska Plaister</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Tan Tan</td>
                    <td>$750.83</td>
                    <td>$750.83</td>
                </tr>
                <tr>
                    <td>Rikki Sommer</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Signal</td>
                    <td>$1,200.00</td>
                    <td>$1,200.00</td>
                </tr>
                <tr>
                    <td>Jdaive Morden</td>
                    <td>Male</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$2,500.00</td>
                    <td>$2,500.00</td>
                </tr>
                <tr>
                    <td>Victoria Candy</td>
                    <td>05/10/2019</td>
                    <td>05/10/2019</td>
                    <td>Twitter</td>
                    <td>$3,200.00</td>
                    <td>$3,200.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<!-- MODAL CALENDAR -->
<!-- calendar modal -->
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
      </div>
      <div class="modal-body">
        <div id="testmodal" style="padding: 5px 20px;">
          <form id="antoform" class="form-horizontal calender" role="form">
            <div class="form-group">
              <label class="col-sm-3 control-label">Title</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="title" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Description</label>
              <div class="col-sm-9">
                <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary antosubmit">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
      </div>
      <div class="modal-body">

        <div id="testmodal2" style="padding: 5px 20px;">
          <form id="antoform2" class="form-horizontal calender" role="form">
            <div class="form-group">
              <label class="col-sm-3 control-label">Title</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="title2" name="title2">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Description</label>
              <div class="col-sm-9">
                <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
              </div>
            </div>

          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
<?= $this->endSection() ?>
