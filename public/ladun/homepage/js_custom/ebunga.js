// ROUTE 
var rToDetailProduct = server + "product/detail/";
var rToCheckArea = server + "product/checkarea";
// VUE OBJECT 
var div_product_depan = new Vue({
    el : '#div_product_depan',
    data : {
        cap_div : 'Product of Ebunga'
    },
    methods : {
        detailAtc : function(idProduct)
        {
            document.querySelector('#txtLokasi').value = '';
            document.querySelector('#result-box').innerHTML = '';
            axios.get(rToDetailProduct+idProduct).then(function(res){
                let dataProduct = res.data.product;
                div_modal_product.title_modal = dataProduct.nama_produk;
                div_modal_product.deks_produk = dataProduct.deks_produk;
                div_modal_product.price = dataProduct.harga;
                div_modal_product.kd_produk = dataProduct.kd_produk;
                document.querySelector('#picMain').setAttribute("src", server+"ladun/ebunga_asset/image/product/"+dataProduct.foto_utama);
                $('#txtLokasi').focus();
            });
            
        }
    }
});

var div_modal_product = new Vue({
    el : '#div_modal_product',
    data : {
        title_modal : 'loading ...',
        deks_produk : 'loading ...',
        kd_produk : '',
        currency : 'Rp.',
        price : 'loading ...',
        mainPicProduct : '',
        listDaerah : []
    }
});

// Inisialisasi
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#loaderLokasi').hide();
$('#txtTabelArea').hide();

// Function
function selectArea(idKel)
{
    console.log(idKel);
}

function getArea()
{
    let lokasi = $('#txtLokasi').val();
    let kd_produk = div_modal_product.kd_produk;
    if(lokasi.length > 5){
        $('#loaderLokasi').show()
        axios.post(rToCheckArea, {slug:lokasi, kd_produk:kd_produk}).then(function(res){
            $("#result-box").html(res.data);
        });
        $('#loaderLokasi').hide()
    }else{
        $("#result-box").html("");
    }
}
