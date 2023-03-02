<style>
.toggle-handle {
    background-color: white;
}
</style>

<!-- ======= Team Section ======= -->
<section id="team" class="team mt-5 mb-0">

    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>Monitoring</h2>
            <p>Monitor Komponen SIPH</p>
        </header>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nama Komponen</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Katup</td>
                <td>
                    <input type="checkbox" <?= ($components['katup'] == 1) ? 'checked' : '' ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" onchange="updateKatup(this)">
                </td>
            </tr>
            <tr>
                <td>Pompa</td>
                <td>
                    <input type="checkbox" <?= ($components['pompa'] == 1) ? 'checked' : '' ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" onchange="updatePompa(this)">
                </td>
            </tr>
            <tr>
                <td>Lampu</td>
                <td>
                    <input type="checkbox" <?= ($components['lampu'] == 1) ? 'checked' : '' ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" onchange="updateLampu(this)">
                </td>
            </tr>
        </tbody>
        </table>
    </div>

</section><!-- End Team Section -->

<!-- ======= Counts Section ======= -->
<div id="counts" class="counts mt-0 pt-0">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-4">
            <div class="count-box">
              <i class="bi bi-water"></i>
              <div>
                <span><?= $components['ultrasonik'] ?> cm</span>
                <p>Ketinggian Air</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="count-box">
              <i class="bi bi-percent" style="color: #ee6c20;"></i>
              <div>
                <span><?= $components['soilMoisture'] ?>%</span>
                <p>Kelembaban Tanah</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="count-box">
              <i class="bi bi-lightbulb" style="color: #15be56;"></i>
              <div>
                <span><?= $components['durasiLampu'] ?></span>
                <p>Durasi Lampu Menyala</p>
              </div>
            </div>
          </div>

        </div>

      </div>
</div><!-- End Counts Section -->

<script>
  function updateKatup(katup) {
    katup.disabled = true;
    var status;

    if (katup.checked) {
      status = 'on';
    }else{
      status = 'off';
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url("index.php/api/update_status_katup")?>',
      async:false,
      cache: false,
      data:{ status: status },
      dataType: 'html',
      success: function(data) {
        data = JSON.parse(data);
        console.log(data);
        if (data['status'] == true) {
          alert(data.msg);
        }else {
          alert(data.msg);
        }

        katup.disabled = false;
      },

    });
  }

  function updatePompa(pompa) {
    pompa.disabled = true;
    var status;

    if (pompa.checked) {
      status = 'on';
    }else{
      status = 'off';
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url("index.php/api/update_status_pompa")?>',
      async:false,
      cache: false,
      data:{ status: status },
      dataType: 'html',
      success: function(data) {
        data = JSON.parse(data);
        console.log(data);
        if (data['status'] == true) {
          alert(data.msg);
        }else {
          alert(data.msg);
        }

        pompa.disabled = false;
      },

    });
  }

  function updateLampu(lampu) {
    lampu.disabled = true;
    var status;

    if (lampu.checked) {
      status = 'on';
    }else{
      status = 'off';
    }

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url("index.php/api/update_status_lampu")?>',
      async:false,
      cache: false,
      data:{ status: status },
      dataType: 'html',
      success: function(data) {
        data = JSON.parse(data);
        console.log(data);
        if (data['status'] == true) {
          alert(data.msg);
        }else {
          alert(data.msg);
        }

        lampu.disabled = false;
      },

    });
  }
  
</script>