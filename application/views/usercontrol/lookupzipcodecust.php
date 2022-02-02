
  <div class="col-md-5">
  <div class="form-group">
  <input name="kelurahan_ktp_cust" id="kelurahan" type="text" placeholder="Kelurahan*" onfocus="clicklookup()" class="form-control" required maxlength="50">
  <input name="kecamatan_ktp_cust" id="kecamatan" type="text" placeholder="Kecamatan*"  onfocus="clicklookup()"   class="form-control" required maxlength="50">
  <input name="kota_ktp_cust" id="kota" type="text" placeholder="Kota*"  onfocus="clicklookup()"   class="form-control" required maxlength="50">
<input name="zipcode_ktp_cust" id="zipcode" type="text" placeholder="kode pos*"  onfocus="clicklookup()"   class="form-control" required maxlength="50">
  </div>
</div>
  <div class="col-md-1">
    <div class="form-group">
      <a href="#" id="lookupbtn"  type="button"  data-toggle="modal" data-target="#myModal"><i class="fa fa-search" style="font-size:24px"></i></a>
  </div>
</div>


	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label class="bmd-label-floating">Kelurahan</label>
          	<input id="searchKelurahan" type="text"  class="form-control"  maxlength="50">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <label class="bmd-label-floating">Kecamatan</label>
          <input id="searchKecamatan" type="text" class="form-control"   maxlength="50">
        </div>
      </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label class="bmd-label-floating">Kota</label>
            <input id="searchKota" type="text"  class="form-control"  maxlength="50">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <label class="bmd-label-floating">Kode Pos</label>
          <input id="searchKodePos" type="text" class="form-control"   maxlength="50">
        </div>
      </div>
    </div>
        <div class="col-md-12">
          <div align="right">
          <button type="button" id="searchZipcode" class="btn btn-default" >Cari</button>
        </div>
          <div id="result">

           </div>
          </div>
        </div>


    </div>

  </div>
</div>
