$(document).ready(function () {
    $(document).on('click', '.box_dangnhap', function(){
        $('.register_content').css("display", 'none');
        $('.login-web').css("display", 'block');
    })

    $(document).on('click', '.box_dangky', function(){
        $('.login-web').css("display", 'none');
        $('.register-web').css("display", 'block');
    })

    $(document).on('click', '#register_web', function(){
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var repassword = document.getElementById('repassword').value;
        var number_phone = document.getElementById('number_phone').value;
        var address = document.getElementById('address').value;
    
        if (username === '' || email === '' || password === '' || repassword === '' || number_phone === '' || address === '') {
            alert('Vui lòng điền đầy đủ thông tin.');
        } else {
            document.getElementById('registrationForm').submit();
        }
    })

    $(document).on('click','.ant-menu-1', function(){
        $('.login_form').css("display", 'none');
        $('.page_content_website').css("display", 'block');
    })
    
    document.addEventListener('DOMContentLoaded', (event) => {
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const photo = document.getElementById('photo');
        const captureButton = document.getElementById('capture');
      
        // Kiểm tra hỗ trợ Camera
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
          navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
              video.srcObject = stream;
              video.play();
            })
            .catch((error) => {
              console.error('Không thể mở Camera:', error);
            });
      
          // Xử lý sự kiện chụp ảnh
          captureButton.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
      
            // Hiển thị ảnh đã chụp
            photo.src = canvas.toDataURL('image/png');
            photo.style.display = 'block';
            canvas.style.display = 'none';
            video.style.display = 'none';
          });
        } else {
          console.error('Trình duyệt không hỗ trợ API Camera.');
        }
      });
      $(document).on("click", '.tuy_chinh', function () {
        if ($(this).parents('.tabl_tuyc').find('.detl_tuychinh').attr('data-show') == 0) {
          $('.detl_tuychinh').css('display', 'none');
          $(this).parents('.tabl_tuyc').find('.detl_tuychinh').css('display', 'block');
          $(this).parents('.tabl_tuyc').find('.detl_tuychinh').attr('data-show', 1);
          $(this).parents('.tabl_tuyc').find('.detl_tuychinh').addClass('active');
        } else {
          $('.detl_tuychinh').css('display', 'none');
          $(this).parents('.tabl_tuyc').find('.detl_tuychinh').css('display', 'none');
          $(this).parents('.tabl_tuyc').find('.detl_tuychinh').attr('data-show', 0)
          $(this).parents('.tabl_tuyc').find('.detl_tuychinh').removeClass('active');
        }
    });

    $(document).on("click", '.chonmuc_moi_cty', function () {
      let id_cty = Number($(this).attr('data-cty'));
      $('.page_cty').removeClass('active');
      $(`.page_cty[data-cty="${id_cty}"]`).addClass('active');
      $('.page_cty').css('display', 'none');
      $('.page_nv').css('display', 'none');
      $(`.page_cty[data-cty="${id_cty}"]`).css('display', 'block');
    });
    $(document).on("click", '.chonmuc_moi_nv', function () {
      let id_nv = Number($(this).attr('data-nv'));
      $('.page_nv').removeClass('active');
      $(`.page_nv[data-nv="${id_nv}"]`).addClass('active');
      $('.page_nv').css('display', 'none');
      $('.page_cty').css('display', 'none');
      $(`.page_nv[data-nv="${id_nv}"]`).css('display', 'block');
    });

    $(document).on("click", '#start-cham-cong', function () {
      $('.page_content_website').css('display', 'none');
      $('.footer_main').css('display', 'none');
      $('.log-w3').css('display', 'none');
      // $('.page-content-update-face').css('display', 'none');
      $('.page-cham-cong').css('display','block');
    });

    $(document).on("click", '.add-ca', function () {
      $('.form-content-ca').css('display', 'none');
      $('.form-content-add-ca').css('display','block');
    });

    document.addEventListener("DOMContentLoaded", function () {
      const video = document.getElementById('camera');
      const countdownElement = document.getElementById('countdown');
      let countdown = 5;
  
      // Hàm để bật camera
      async function startCamera() {
          try {
              const stream = await navigator.mediaDevices.getUserMedia({ video: true });
              video.srcObject = stream;
          } catch (error) {
              console.error('Error accessing camera:', error);
          }
      }
  
      // Hàm để đếm ngược và chụp ảnh
      function startCountdown() {
          startCamera();
  
          const countdownInterval = setInterval(() => {
              countdownElement.textContent = countdown;
              countdown--;
  
              if (countdown < 0) {
                  clearInterval(countdownInterval);
                  takePhoto();
              }
          }, 1000);
      }
  
      // Hàm để chụp ảnh
      function takePhoto() {
          const canvas = document.createElement('canvas');
          const context = canvas.getContext('2d');
          canvas.width = video.videoWidth;
          canvas.height = video.videoHeight;
          context.drawImage(video, 0, 0, canvas.width, canvas.height);
          // const imageData = canvas.toDataURL('image/png');
          // const fs = require('1');
          const imageData = canvas.toDataURL('image/png');
          const link = document.createElement('chamcong');
          link.href = imageData;
          link.download = 'captured_image.png';
          link.click();
          // // Đường dẫn đến thư mục bạn muốn tạo
          // const folderPath = './data';

          // // Tạo thư mục
          // fs.mkdir(folderPath, { recursive: true }, (err) => {
          //     if (err) {
          //         console.error('Error creating folder:', err);
          //     } else {
          //         console.log('Folder created successfully.');
          //     }
          // });


            
          // Đoạn mã này có thể sử dụng canvas.toDataURL() để lấy dữ liệu hình ảnh và thực hiện các thao tác khác (lưu trữ, hiển thị, v.v.)
          // Ví dụ: const imageData = canvas.toDataURL('image/png');
          // Bạn có thể gửi imageData đến máy chủ hoặc thực hiện các xử lý khác tùy thuộc vào yêu cầu của bạn.
      }
  });
})