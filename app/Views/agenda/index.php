<?= $this->extend('layout/base') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-sm-12">
    <div class="page-title-box">
      <h4 class="page-title">Agenda</h4>
    </div>
  </div>

  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3">
            dsa
          </div>
          <div class="col-lg-9">
            <div id="calendar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js_section') ?>
<script src="<?= base_url('assets/vendor/fullcalendar/main.min.js') ?>"></script>
<script>
  $(document).ready(function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events: '<?= base_url('agenda/getAgenda') ?>'
    });
    calendar.render();
  });
</script>
<?= $this->endSection() ?>