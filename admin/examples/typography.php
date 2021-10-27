
    
      <!-- End Navbar -->
      <style>
        .file {
  opacity: 0;
  width: 0.1px;
  height: 0.1px;
  position: absolute;
}

.file-input label {
  display: block;
  position: relative;
  width: 200px;
  height: 50px;
  border-radius: 25px;
  background: linear-gradient(40deg,#ff6ec4,#7873f5);
  box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: transform .2s ease-out;
}

.file-name {
  position: absolute;
  bottom: -35px;
  left: 10px;
  font-size: 0.85rem;
  color: #fff;
}

input:hover + label,
input:focus + label {
  transform: scale(1.02);
}

/* Adding an outline to the label on focus */
input:focus + label {
  outline: 1px solid #000;
  outline: -webkit-focus-ring-color auto 2px;
}
      </style>
      
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add Teachers</h4>
              <p class="card-category">Create account for teachers</p>
            </div>
            <div class="card-body">
              <div id="typography">
                <div class="card-title">
                  <div class="row">
                    <div class="col-8"><h3>Upload CSV file</h3></div>
                    <div class="col-4"><a href="../../teacher_cred.csv" target="_blank" class="btn btn-success" download="teacher creadential sample">download sample csv</a></div>
                  </div>
                </div>
                <!-- card body -->
                  <form action="" id="upload_csv" method='post' enctype='mutipart/form-data'>
                  <div class="file-input">
                  <label for="file">
                    <center> <input type="file" id="file" class="file" name="csv_file" id="csv_file" accept='.csv' ></center>
                     Select file
                      <p class="file-name"></p>
                    </label>
                      <center>  <input type="submit" value="submit" id='upload' class='btn btn-info'></center>
                  </div>
                  </div>
                  <div class="clear:both"></div>
                  </form>
                  <div id="csv_file_data"></div>
              </div>
            </div>
          </div>
        </div>
 