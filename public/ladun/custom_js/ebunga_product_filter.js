/**
 * Route
 */
var rToDefaultProduct = server + "rest/product/list/default";
var rToGetProductByKelurahan = server + "rest/product/getProductByKelurahan";
var rToGetForkDaerah = server + "get/location/fork/";
/**
 * Vue object
 */
var divListProduk = new Vue({
  el : '#divListProduk',
  data : {
    provinsiData : [],
    kabupatenData : [],
    kecamatanData : [],
    kelurahanData : [],
    produk : [],
    kdKelurahanDipilih : ''
  },
  methods : {

  }
});

/**
 * Inisialisasi
 */
pesanUmumApp('info', 'Set delivery area first', 'Please set area to delivery ..');
$('#txtDaerah').focus();

$("#txtDaerah").select2({
    minimumInputLength: 4,
    allowClear: true,
    placeholder: 'masukkan nama kelurahan',
    ajax: {
        url: server + "get/location/kelurahan",
        type: "post",
        dataType: 'json',
        delay: 200,
        data: function (params) {
         return {
           searchTerm: params.term // search term
         };
        },
        processResults: function (response) {
          return { results: response };
        },
        cache: true
       }
}).on('select2:select', function (evt) {
    let kdKelurahan = $("#txtDaerah").val();
    divListProduk.kdKelurahanDipilih = kdKelurahan;
    searchKel(kdKelurahan);
    updateArea(kdKelurahan);

 });

/**
 * Function
 */
 function updateArea(kdKelurahan)
 {
   clearProvinsi();
   clearKabupaten();
   clearKecamatan();
   clearKelurahan();
   axios.get(rToGetForkDaerah+kdKelurahan).then(function(res){
     let data = res.data;
     let kelurahan = data.dataKelurahan;
     let kecamatan = data.dataKecamatan;
     let kabupaten = data.dataKabupaten;
     let provinsi = data.dataProvinsi;
     let kelurahanAll = data.dataAllKelurahan;
     let kecamatanAll = data.dataAllKecamatan;
     let kabupatenAll = data.dataAllKabupaten;
     let provinsiAll = data.dataAllProvinsi;

     kelurahanAll.forEach(renderKelurahanAll);
     kecamatanAll.forEach(renderKecamatanAll);
     kabupatenAll.forEach(renderKabupatenAll);
     provinsiAll.forEach(renderProvinsiAll);

     function renderKelurahanAll(item, index){
       divListProduk.kelurahanData.push({ nama:kelurahanAll[index].nama, id_kel:kelurahanAll[index].id_kel });
     }
     function renderKecamatanAll(item, index){
       divListProduk.kecamatanData.push({ nama:kecamatanAll[index].nama, id_kec:kecamatanAll[index].id_kec });
     }
     function renderKabupatenAll(item, index){
       divListProduk.kabupatenData.push({ nama:kabupatenAll[index].nama, id_kab:kabupatenAll[index].id_kab });
     }
     function renderProvinsiAll(item, index)
     {
       divListProduk.provinsiData.push({ nama:provinsiAll[index].nama, id_prov:provinsiAll[index].id_prov });
     }
     setTimeout(function(){
       $('#txtKelurahan').val(kdKelurahan);
       $('#txtKecamatan').val(kecamatan.id_kec);
       $('#txtKabupaten').val(kabupaten.id_kab);
       $('#txtProvinsi').val(provinsi.id_prov);
     }, 500);
   });
 }

function clearProvinsi()
{
  let pjg = divListProduk.provinsiData.length;
  let i;
  for(i = 0; i < pjg; i++){
    divListProduk.provinsiData.splice(0,1);
  }
}

function clearKabupaten()
{
  let pjg = divListProduk.kabupatenData.length;
  let i;
  for(i = 0; i < pjg; i++){
    divListProduk.kabupatenData.splice(0,1);
  }
}

function clearKecamatan()
{
  let pjg = divListProduk.kecamatanData.length;
  let i;
  for(i = 0; i < pjg; i++){
    divListProduk.kecamatanData.splice(0,1);
  }
}

function clearKelurahan()
{
  let pjg = divListProduk.kelurahanData.length;
  let i;
  for(i = 0; i < pjg; i++){
    divListProduk.kelurahanData.splice(0,1);
  }
}

function searchKel(kdKelurahan)
{
  clearProduk();
  $('#divLoading').show();
  $('#divListProduk').hide();
  $('#divNoProduct').hide();
    var ds = {'kategori':kategori, 'kelurahan':kdKelurahan}
    axios.post(rToDefaultProduct, ds).then(function(res){
      let dr = res.data;
      let status = dr.status;
      if(status === 'no_product'){
        pesanUmumApp('warning', 'No product', 'No product available on area');
        $('#divSearchCoverage').hide();
        $('#divNoProduct').show();
      }else{
        $('#divNoProduct').hide();
        let produk = dr.produk;
        produk.forEach(renderProduk);
        function renderProduk(item, index){
          divListProduk.produk.push({
            nama : produk[index].nama,
            kd_produk : produk[index].kd,
            kabupaten :produk[index].kabupaten,
            foto : produk[index].foto,
            harga : produk[index].harga,
            slug : produk[index].slug
          });
        }
      }
    });

    setTimeout(function(){
      $('#divListProduk').show();
    }, 500);

    setTimeout(function(){
      $('#divLoading').hide();
    }, 500);

}


function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}

function clearProduk()
{
  let pjgArray = divListProduk.produk.length;
  var i;
  for(i = 0; i < pjgArray; i++)
  {
    divListProduk.produk.splice(0,1);
  }
}
