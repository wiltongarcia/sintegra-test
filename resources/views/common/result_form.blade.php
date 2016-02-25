        <form action="/api/results/search" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="cnpj" class="col-sm-3 control-label">CNPJ</label>

                <div class="col-sm-6">
                    <input type="text" name="cnpj" id="cnpj" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Enviar
                    </button>
                </div>
            </div>
        </form>
        <script type="text/javascript" charset="utf-8">
            $(function(){
                $("#cnpj").mask("99.999.999/9999-99");
            })    
        </script>
