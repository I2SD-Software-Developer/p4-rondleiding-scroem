const panorama = new PANOLENS.ImagePanorama( 'asset/demo-1.jpg' );
const viewer = new PANOLENS.Viewer( { output: 'console' } );
viewer.add( panorama );