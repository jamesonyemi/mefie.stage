<script>

  $(document).on("click", "#show-modal", function () {
      let href = $(this).attr('href');
      let FormControl  = document.querySelector("#deleteForm");
      console.log(href);
      let res = FormControl.setAttribute('action',href);
      console.log(res);
  })

</script>