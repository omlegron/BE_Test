<script type="text/javascript">

	// SAVE DATA
    $(document).on('click', '.save', function (e) {
        var form = $(this).data('form');
        var callback = $(this).data('callback');
        if(!form){
          form = 'formData';
        } 

        if(!callback){
            callback = null;
        } 
        saveData(form,callback);

    });

    function saveData(formid, callback) {

        $("#" + formid).ajaxSubmit({
            success: function (resp) {
                console.log('resp',resp)
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: (resp.text) ? resp.text : 'Successfully saved data',
                  confirmButtonText:'<i class="fa fa-thumbs-up"></i> Close !',
                  confirmButtonAriaLabel: 'Thumbs up, great!',
                  // footer: '<a href>Why do I have this issue?</a>'
              }).then(function(){
                if(resp.href){
                    location.href = "{{ url('/') }}/"+resp.href;
                }else{
                    location.href  = "{{ isset($route) ? route($route.'.index') : url('/admin') }}";
                }
            });

          },
          error: function (resp) {
            $('.loadings').hide();
            var response = resp.responseJSON;
            var addErr = {};

            if(resp.responseJSON && resp.responseJSON.errors){
                $.each(response.errors, function (index, val) {

                    var response = resp.responseJSON;
                    if (index.includes(".")) {
                        res = index.split('.');
                        index = '';
                        for (i = 0; i < res.length; i++) {
                            if (i == 0) {
                                res[i] = res[i];
                            } else {
                                if (res[i] == 0) {
                                    res[i] = '\\[\\]';
                                } else {
                                    res[i] = '[' + res[i] + ']';
                                }
                            }
                            index += res[i];
                        }
                    }
                    clearFormError(index,val,formid);

                    var name = index.split('.').reduce((all, item) => {
                        all += (index == 0 ? item : '[' + item + ']');
                        return all;
                    });
                    var fg = $('[name="' + name + '"], [name="' + name + '[]"]').closest('.form-group');

                    fg.addClass('has-error');

                    fg.append('<small class="control-label error-label font-bold" style="margin-top: 0.25rem;font-size: smaller;color: #ea5455;">' + val + '</small>')
                });

                $("html, body").animate({ scrollTop: 0 }, "slow");

                Swal.fire({
                  icon: 'info',
                  title: (resp.responseJSON.message) ? resp.responseJSON.message : 'Looks like something wrong',
                  html: showBoxValidation(resp),
              });
            }else{
                Swal.fire({
                  icon: 'info',
                  title: (resp.responseJSON.message) ? resp.responseJSON.message : 'Looks like something wrong',
                  html: showBoxValidation(resp),
              });
            }
            
            var intrv = setInterval(function(){
                $('.form-group .error-label').slideUp(500, function(e) {
                    $(this).remove();
                    $('.form-group.has-error').removeClass('has-error');
                    clearTimeout(intrv);
                });
            }, 20000)

        }
    });
    }

    function showBoxValidation(resp, message){
        var temp = ``;
        if(resp.statusText = 'Unprocessable Entity'){
            temp += `<div class="sidebar-widget wow fadeInUp outer-top-vs animated" style="visibility: visible; animation-name: fadeInUp;"><h3 class="section-title "><b>Incomplete Data Input</> </h3><div class="sidebar-widget-body" ><div class="compare-report"><ul class="list text-left bold" style="font-size:16px;list-style:inside;">`;
            if(resp.responseJSON){
                if(resp.responseJSON.errors){
                    var data = resp.responseJSON.errors;
                    $.each(data,function(key,value){
                        temp += `<li><small style="color:red">`+upperCase(key.replace("_", " "))+` : ` +value[0]+ `</small></li>`;
                    });
                }
            }
            temp += `</ul></div></div></div>`;
        }else{
            temp = 'System Error Occurred';
        }
        return temp;
    }

    function upperCase(data){
        var result = data.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        return result;
    }

    function clearFormError(key, value, formData) {
        if (key.includes(".")) {
            res = key.split('.');
            key = res[0] + '[' + res[1] + ']';
            if (res[1] == 0) {
                key = res[0] + '\\[\\]';
            }
            // 
        }
        var elm = $("#" + formData).find('[name="' + key + '"]').closest('.form-group');
        $(elm).removeClass('has-error');
        var showerror = $("#" + formData).find('[name="' + key + '"]').closest('.form-group').find('.control-label.error-label.font-bold').remove();
    }
</script>