// 'use strict';
// const video = document.getElementById('video');
// const canvas = document.getElementById('canvas');
// const snap = document.getElementById('snap');
// const errorMsgElement = document.getElementById('span#ErrorMsg');

// const constraints = {
//     audio:true,
//     video:{
//         width: 800, height: 650
//     }
// }

// async function init(){
//     try{
//         const stream = await navigator.mediaDevices.getUserMedia(constraints);
//         handleSuccess(stream);
//     }
//     catch(e){
//         errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
//     }
// }

// function handleSuccess(stream){
//     window.stream = stream;
//     video.srcObject = stream
// }

// init();

// var context =canvas.getContext('2d');
// snap.addEventListener("click", function(){
//     context.drawImage(video, 0, 0, 140, 120);
// })

// document.addEventListener("DOMContentLoaded", function () {
//     let videoElement = document.getElementById('video');
//     let startButton = document.getElementById('start-upd');
//     let stopButton = document.getElementById('out-upd, closs-upd');
//     let stream;

//     // Khởi tạo camera
//     startButton.addEventListener('click', function () {
//         navigator.mediaDevices.getUserMedia({ video: true })
//             .then(function (mediaStream) {
//                 videoElement.srcObject = mediaStream;
//                 stream = mediaStream;
//             })
//             .catch(function (err) {
//                 console.log('Error: ' + err);
//             });
//     });

//     // Tắt camera
//     stopButton.addEventListener('click', function () {
//         if (stream) {
//             let tracks = stream.getTracks();
//             tracks.forEach(track => track.stop());
//             videoElement.srcObject = null;
//         }
//     });
// });

document.addEventListener('DOMContentLoaded', function () {
    const captureButton = document.getElementById('snap');
    const onvideo = document.getElementById('start-upd');
    const imageContainer = document.getElementById('canvas');
    let imageIndex = 1;

    // Mở camera và chụp ảnh
    onvideo.addEventListener('click', function () {
        const videoConstraints = {
            video: {
                facingMode: 'user',
                width: { ideal: 800 },
                height: { ideal: 650 }
            }
        };

        navigator.mediaDevices.getUserMedia(videoConstraints)
            .then(function (stream) {
                const video = document.createElement('video');
                video.srcObject = stream;
                video.play();

                // Tạo canvas để vẽ hình ảnh từ video
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');

                // Chụp ảnh khi nhấn nút
                captureButton.onclick = function () {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);

                    // Hiển thị ảnh đã chụp
                    const capturedImage = document.createElement('img');
                    capturedImage.src = canvas.toDataURL('image/png');
                    capturedImage.classList.add('captured-image');
                    capturedImage.alt = 'Captured Image ' + imageIndex++;

                    imageContainer.appendChild(capturedImage);
                };
            })
            .catch(function (error) {
                console.error('Error accessing camera:', error);
            });
    });
});