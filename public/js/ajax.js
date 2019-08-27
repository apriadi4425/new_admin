$(document).ready(function (){
	sembunyikan();
	function sembunyikan(){
		 $(".print-error-msg").fadeOut(3000);
	}

  	 function printErrorMsg (msg) {
  	 	setTimeout(sembunyikan,2000);
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+key+' :'+value+'</li>');
            });
             $('html, body').animate({
			      scrollTop: 0
			    }, 0);
			    return false;
			    
        }

	$("#save_artikel").click( function(e) {
				e.preventDefault();
				var judul_berita = $("#judul_berita").val();
				var isi = $("#isi").val();
				var post_by = $("#post_by").val();
				var tampil = $("input[name='tampil']:checked").val();
				var kategori_id = $("#kategori_id").val();
				$.ajax({
					url: base_url+'/add_berita/',
					headers: {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  },
					type: 'POST',
					dataType: 'JSON',
					data: {judul_berita:judul_berita, isi:isi, post_by:post_by, tampil:tampil, kategori_id:kategori_id},
					success: function (data) {
						 if($.isEmptyObject(data.error)){
	                       	window.location.href = base_url+'/add_berita/'+data.id;
	                    }else{
	                        printErrorMsg(data.error);
	                    }
					}
				});
	});

	$("#save_close").click( function(e) {
			e.preventDefault();
				var judul_berita = $("#judul_berita").val();
				var isi = $("#isi").val();
				var post_by = $("#post_by").val();
				var tampil = $("input[name='tampil']:checked").val();
				var kategori_id = $("#kategori_id").val();
				$.ajax({
					url: base_url+'/add_berita/',
					headers: {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  },
					type: 'POST',
					dataType: 'JSON',
					data: {judul_berita:judul_berita, isi:isi, post_by:post_by, tampil:tampil, kategori_id:kategori_id},
					success: function (data) {
						 if($.isEmptyObject(data.error)){
	                       	window.location.href = base_url;
	                    }else{
	                        printErrorMsg(data.error);
	                    }
					}
				});
		});
	$("#save_edit").click( function(e) {
				e.preventDefault();
				var id = $("#id").val();
				var judul_berita = $("#judul_berita").val();
				var isi = $("#isi").val();
				var post_by = $("#post_by").val();
				var tampil = $("input[name='tampil']:checked").val();
				var kategori_id = $("#kategori_id").val();
				$.ajax({
					url: base_url+'/add_berita/',
					headers: {
					    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  },
					type: 'PUT',
					dataType: 'JSON',
					data: {id:id,judul_berita:judul_berita, isi:isi, post_by:post_by, tampil:tampil, kategori_id:kategori_id},
					success: function (data) {
	                    alert('Berhasil Menyimpan');
					}
				});
	});
});