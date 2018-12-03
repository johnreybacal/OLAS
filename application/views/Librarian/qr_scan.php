<script src="<?php echo base_url('assets/js/script/plugins/qr-scanner.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/script/plugins/qr-scanner-worker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<style>
	canvas {
        display: none;
    }
    hr {
        margin-top: 32px;
    }
    input[type="file"] {
        display: block;
        margin-bottom: 16px;
    }
    div {
        margin-bottom: 16px;
    }
    video {
        height: 400px;
        width: 400px;
    }
    .container {
        width: 200px;
        overflow:hidden;
        display:block;
        height: 360px;
    }
    #qr-video {
        margin-left: -110px;
    }
</style>

<body>
	<div class="container">
		<video muted autoplay playsinline id="qr-video"></video>
		<canvas id="debug-canvas"></canvas>
	</div>
	<img src="">
	<b>Detected QR code: </b>
	<a href="" id="cam-qr-result">None</a>
	<hr>
    
	<input type="file" id="file-selector">
	<b>Detected QR code: </b>
	<a href="" id="file-qr-result">None</a>

<script type="module">
		import QrScanner from "<?=base_url('assets/js/script/plugins/qr-scanner.min.js');?>";
    const video = document.getElementById('qr-video');
    const debugCheckbox = document.getElementById('debug-checkbox');
    const debugCanvas = document.getElementById('debug-canvas');
    const debugCanvasContext = debugCanvas.getContext('2d');
    const camQrResult = document.getElementById('cam-qr-result');
    const fileSelector = document.getElementById('file-selector');
    const fileQrResult = document.getElementById('file-qr-result');

    function setResult(label, result) {
        label.textContent = result;
        label.style.color = 'teal';
        clearTimeout(label.highlightTimeout);
        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
    }

    const scanner = new QrScanner(video, result => setResult(camQrResult, result));
    scanner.start();


    fileSelector.addEventListener('change', event => {
        const file = fileSelector.files[0];
        if (!file) {
            return;
        }
        QrScanner.scanImage(file)
            .then(result => setResult(fileQrResult, result))
            .catch(e => setResult(fileQrResult, e || 'No QR code found.'));
    });

    function setDebugMode(isDebug) {
        const worker = scanner._qrWorker;
        worker.postMessage({
            type: 'setDebug',
            data: isDebug
        });
        if (isDebug) {
            debugCanvas.style.display = 'block';
            worker.addEventListener('message', handleDebugImage);
        } else {
            debugCanvas.style.display = 'none';
            worker.removeEventListener('message', handleDebugImage);
        }
    }

    function handleDebugImage(event) {
        const type = event.data.type;
        if (type === 'debugImage') {
            const imageData = event.data.data;
            if (debugCanvas.width !== imageData.width || debugCanvas.height !== imageData.height) {
                debugCanvas.width = imageData.width;
                debugCanvas.height = imageData.height;
            }
            debugCanvasContext.putImageData(imageData, 0, 0);
        }
    }

    
</script>
</body>