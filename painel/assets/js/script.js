$(function () {
    //mascaras
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };



    $('.telefone').mask(SPMaskBehavior, spOptions);
    $('.cep').mask('00000-000');
    $('.data').mask("00/00/0000");
    $('.cnpj').mask('00.000.000/0000-00');
    $('.cpf').mask('000.000.000-00');
});
//Editar Categoria
$('#modal_pizza_pedido_edit').on('show.bs.modal', function (event){
    var button = $(event.relatedTarget);
    var pizza = button.data('pizza');
    var id_pizza = button.data('id_pizza');
    var quantidade = button.data('qtde');

    var modal = $(this);
    modal.find('#pizza_edit').text(pizza);
    modal.find('#id_pizza_edit').val(id_pizza);
    modal.find('#quantidade_edit').val(quantidade);
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});