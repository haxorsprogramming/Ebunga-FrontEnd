// Vue object 
var divProduct = new Vue({
    el : '#divProduct',
    data : {
        qt : 1
    },
    methods : {
        addQtAtc : function()
        {
            this.qt++;
            console.log(this.qt);
        },
        incQtAtc : function()
        {
            if(this.qt <= 0){
                
            }else{
                this.qt--;
                console.log(this.qt);
            }
        }
    }
});