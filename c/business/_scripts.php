<script src="../../skydash/vendors/js/vendor.bundle.base.js"></script>

<script src="../../skydash/vendors/chart.js/Chart.min.js"></script>
<script src="../../skydash/vendors/inputmask/jquery.inputmask.bundle.js"></script>
<script src="../../skydash/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<script src="../../skydash/vendors/dropify/dropify.min.js"></script>
<script src="../../skydash/vendors/tinymce/tinymce.min.js"></script>
<script src="../../skydash/js/off-canvas.js"></script>
<script src="../../skydash/js/hoverable-collapse.js"></script>
<script src="../../skydash/js/template.js"></script>
<script src="../../skydash/js/settings.js"></script>
<script src="../../skydash/js/todolist.js"></script>

<script src="../../skydash/js/jquery.cookie.js" type="ext/javascript"></script>
<script src="../../skydash/js/dashboard.js"></script>
<script src="../../skydash/js/Chart.roundedBarCharts.js"></script>
<script src="../../skydash/js/toastr.min.js"></script>
<script src="../../skydash/js/inputmask.js"></script>

<script src="../../skydash/js/jquery.steps.min.js"></script>
<script src="../../skydash/js/jquery.validate.min.js"></script>
<script src="../../skydash/js/owl-carousel.js"></script>
<script src="../../skydash/js/paginate.js"></script>
<script src="../../skydash/js/dropify.js"></script>

<script src="../../skydash/js/select2.js"></script>
<script src="../../skydash/vendors/select2/select2.min.js"></script>
<script src="../../skydash/js/editorDemo.js"></script>

<script>
    //custom js here

	//modal autofocus
    $(document).on('shown.bs.modal', function() {
      $(this).find('[autofocus]').focus();
      $(this).find('[autofocus]').select();
    });

	//validations
	function btnLoader(formObj){

		formObj.disabled = true;
		formObj.innerHTML = "processing ...";
		return true;  

	}
    
    //toastr custom options
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

</script>