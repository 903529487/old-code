function PreviewImage(imgFile, i) {
				var filextension = imgFile.value.substring(imgFile.value.lastIndexOf("."), imgFile.value.length);
				filextension = filextension.toLowerCase();
				if((filextension != '.jpg') && (filextension != '.gif') && (filextension != '.jpeg') && (filextension != '.png') && (filextension != '.bmp')) {
					alert("请选择系统支持标准格式的照片!");
					imgFile.focus();
				} else {
					//谷歌
					$(".imgPreview").eq(i).show();
					$(".addbut").eq(i).hide();
					var path = window.URL.createObjectURL(imgFile.files[0]);
					$(".imgPreview").eq(i).html("<img id='img1'  src='" + path + "'/>")

				}
				}