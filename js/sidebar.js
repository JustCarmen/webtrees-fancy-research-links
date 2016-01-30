/*
Source: http://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit
*/
function postform(url, params, urlEncoded, newWindow) {
    var form = $('<form />').hide();
    form.attr('action', url)
        .attr('method', 'POST')
        .attr('enctype', urlEncoded ? 'application/x-www-form-urlencoded' : 'multipart/form-data');
    if(newWindow) form.attr('target', '_blank');

    function addParam(name, value, parent) {
        var fullname = (parent.length > 0 ? (parent + '[' + name + ']') : name);
        if(value instanceof Object) {
            for(var i in value) {
                addParam(i, value[i], fullname);
            }
        }
        else $('<input type="hidden" />').attr({name: fullname, value: value}).appendTo(form);
    };

    addParam('', params, '');

    $('body').append(form);
    form.submit();
}