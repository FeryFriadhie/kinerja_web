    <!--notify-->
    {{-- <x:notify-messages /> --}}
    {{-- @notifyJs --}}

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
    <script src="{{ url('') }}/lib/bootstrap/js/bootstrap.min.js"></script>

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

    <!-- datatable -->
    <script>
      $(function(){
        'use strict'

        $('.datatable').DataTable({
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

    <!-- accordion -->
    <script>
      $(function(){
        'use strict'

        // Default functionality
        $('#accordion1').accordion({
          heightStyle: 'content'
        });

      });
    </script>

    <!-- tooltips -->
    <script>
      $(function(){
          $(document).ready(function() {
          //initializing tooltip
          $('[data-toggle="tooltip"]').tooltip();
          });
      });
    </script>

    <!-- select2 -->
    <script>
      // Adding placeholder for search input
      // (function($) {

      //   'use strict'

      //   var Defaults = $.fn.select2.amd.require('select2/defaults');

      //   $.extend(Defaults.defaults, {
      //     searchInputPlaceholder: ''
      //   });

      //     var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');

      //     var _renderSearchDropdown = SearchDropdown.prototype.render;

      //     SearchDropdown.prototype.render = function(decorated) {

      //     // invoke parent method
      //     var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));

      //     this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));

      //     return $rendered;
      //   };

      // })(window.jQuery);

      // Do this before you initialize any of your modals
      // $.fn.modal.Constructor.prototype.enforceFocus = function() {};

      $(function(){
        'use strict'
        // Basic with search
        $('.select2-input').select2({
          placeholder: 'Pilih Satu',
          searchInputPlaceholder: 'Cari Opsi',
          tags: true,
        });
        $('.select2-guru').select2({
            placeholder: 'Pilih Guru',
            searchInputPlaceholder: 'Cari Opsi',
            tags: true,
        });
        $('.select2-status').select2({
            placeholder: 'Pilih Status',
            searchInputPlaceholder: 'Cari Opsi',
            tags: true,
        });
      });

    </script>

    <!-- date picker -->
    <script>
      var dateFormat = 'mm/dd/yy',
      from = $('#dateFrom')
      .datepicker({
        defaultDate: '+1w',
        numberOfMonths: 2
      })
      .on('change', function() {
        to.datepicker('option','minDate', getDate( this ) );
      }),
      to = $('#dateTo').datepicker({
        defaultDate: '+1w',
        numberOfMonths: 2
      })
      .on('change', function() {
        from.datepicker('option','maxDate', getDate( this ) );
      });

      function getDate( element ) {
        var date;
        try {
          date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
          date = null;
        }

        return date;
      }
    </script>

    <script>
      function showGroup(){
        var selectBox = document.getElementById('aspek');
        var userInput = selectBox.options[selectBox.selectIndex].value;

        if (userInput == $aspek->id) {
          document.getElementById('group').style.visibility = 'visible';
        } else {
          document.getElementById('group').style.visibility = 'hidden';
        }
      }
    </script>
