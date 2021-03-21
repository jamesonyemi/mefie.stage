<script>
 if (!document.querySelector("#deleteForm")) {
   alert(true);
 }
  $(document).on("click", "#show-modal", function () {
      let href = $(this).attr('href');
      let FormControl  = document.querySelector("#deleteForm");
      let res = FormControl.setAttribute('action',href);
      console.log(res);
  })
  
  

</script>