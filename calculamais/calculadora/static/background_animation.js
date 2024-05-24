let scene, camera, renderer, stars, starGeo;

function init() {
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 1000);
    camera.position.z = 400;

    renderer = new THREE.WebGLRenderer({ canvas: document.getElementById('bgCanvas'), alpha: true });
    renderer.setSize(window.innerWidth, window.innerHeight);

    starGeo = new THREE.BufferGeometry();
    const starVertices = [];
    for (let i = 0; i < 6000; i++) {
        const x = (Math.random() * 2 - 1) * 1000;
        const y = (Math.random() * 2 - 1) * 1000;
        const z = (Math.random() * 2 - 1) * 1000;
        starVertices.push(x, y, z);
    }
    starGeo.setAttribute('position', new THREE.Float32BufferAttribute(starVertices, 3));

    const sprite = new THREE.TextureLoader().load('https://threejs.org/examples/textures/sprites/disc.png');
    const starMaterial = new THREE.PointsMaterial({
        color: 0xaaaaaa,
        size: 0.7,
        map: sprite,
    });

    stars = new THREE.Points(starGeo, starMaterial);
    scene.add(stars);

    window.addEventListener('resize', onWindowResize, false);

    animate();
}

function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}

function animate() {
    stars.rotation.y += 0.002;
    renderer.render(scene, camera);
    requestAnimationFrame(animate);
}

init();
