    <script src="{{ url('') }}/lib/jquery/jquery.min.js"></script>
    <script src="{{ url('') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/lib/feather-icons/feather.min.js"></script>
    <script src="{{ url('') }}/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ url('') }}/lib/jquery.flot/jquery.flot.js"></script>
    <script src="{{ url('') }}/lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="{{ url('') }}/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="{{ url('') }}/lib/flot.curvedlines/curvedLines.js"></script>
    <script src="{{ url('') }}/lib/peity/jquery.peity.min.js"></script>
    <script src="{{ url('') }}/lib/chart.js/Chart.bundle.min.js"></script>

    <script src="{{ url('') }}/assets/js/dashforge.js"></script>
    <script src="{{ url('') }}/assets/js/dashforge.aside.js"></script>
    <script src="{{ url('') }}/assets/js/dashforge.sampledata.js"></script>
    <script src="{{ url('') }}/assets/js/dashboard-four.js"></script>

    <script src="{{ url('') }}/lib/jqueryui/jquery-ui.min.js"></script>
    <script src="{{ url('') }}/lib/moment/min/moment.min.js"></script>

    {{-- datatable --}}
    <script src="{{ url('') }}/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="{{ url('') }}/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('') }}/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="{{ url('') }}/lib/select2/js/select2.min.js"></script>


    <!-- append theme customizer -->
    <script src="{{ url('') }}/lib/js-cookie/js.cookie.js"></script>
    <script src="{{ url('') }}/assets/js/dashforge.settings.js"></script>

    <script src="{{ url('') }}/lib/prismjs/prism.js"></script>

    <script src="{{ url('') }}/assets/js/dashforge.js"></script>
    <script>
      $(function(){
        'use strict'

        $('[data-toggle="tooltip"]').tooltip();

      })
    </script>
    <script>
      $(function(){
        'use strict'

        $('#example1').DataTable({
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>


  </body>
</html>
