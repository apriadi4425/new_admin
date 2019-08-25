  $(function() {
  	 function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+key+' :'+value+'</li>');
            });
        }

	$("#save_artikel").click( function(e) {
				e.preventDefault();
				var judul_berita = $("#judul_berita").val();
				var isi = $("#isi").val();
				var post_by = $("#post_by").val();
				var tampil = $("input[name='tampil']:checked").val();
				var kategori_id = $("input[name='kategori_id']:checked").val();
				$.ajax({
					url: base_url+'/add_berita',
					headers: {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  },
					type: 'POST',
					dataType: 'JSON',
					data: {judul_berita:judul_berita, isi:isi, post_by:post_by, tampil:tampil, kategori_id:kategori_id},
					success: function (data) {
						 if($.isEmptyObject(data.error)){
	                        alert(data.success);
	                    }else{
	                        printErrorMsg(data.error);
	                    }
					}
				});
	});
  });