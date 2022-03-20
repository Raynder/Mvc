<!-- PAINEL ADMIN HTML -->
<div class="header">
</div>
<div class="conteudo">
    <div class="menu-sys">
        <div class="logo">
            <img src="<?= DIST ?>img/logo.jpg" alt="logo">
        </div>
        <ul>
            <h3>Produtos</h3>
            <?php
                $grupo = new Grupos();
                $grupos = $grupo->listar();

                foreach ($grupos as $grupo) {
                    echo('<a href="' . URL . 'sistema/produtos/' . $grupo['nome'] . '">');
                    echo('<li>' . ucfirst($grupo['nome']) . '</li>');
                    echo('</a>');
                }
            ?>
            <h3>Configurações</h3>
            <a href="<?= URL ?>sistema/grupos">
                <li>Grupos</li>
            </a>
            <a href="<?= URL ?>sistema/ingredientes">
                <li>Ingredientes</li>
            </a>
            <a href="<?= URL ?>sistema/mesas">
                <li>Mesas</li>
            </a>
        </ul>
    </div>

    <div class="itens-lista">
        <div class="lista">
            <h1>Lista de <?= $dados['lista'] ?></h1>
            <table>
                <tr>
                    <?php foreach ($dados['colunas'] as $coluna) {
                    ?>
                        <th><?= ucfirst($coluna) ?></th>
                    <?php } ?>
                    <th>Ações</th>
                </tr>
                <?php foreach ($dados['produtos'] as $dado) {
                ?>
                    <tr>
                        <?php
                        foreach ($dados['colunas'] as $coluna) {
                            if ($coluna == 'img') {
                        ?>
                                <td><img src="<?= DIST . '/img/' . explode('/', $dado['img'])[2] . '/' . explode('/', $dado['img'])[3] ?>" alt="<?= $dado[$coluna] ?>"></td>
                            <?php
                                continue;
                            } ?>
                            <td><?= $dado[$coluna] ?></td>
                        <?php }
                        if (isset($dado['img']) && $dado['img'] != '') {
                            $dado['img'] = str_replace('/', '-', $dado['img']);
                        }
                        ?>
                        <td>
                            <!-- <button value="<?= $dado['id'] ?>" class="btn-editar">Editar</button> -->

                            <?php
                            if ($dados['lista'] == 'grupos') {
                            ?>
                                <button type="button" onclick="window.location.href='<?= URL ?>sistema/excluirGrupo/<?= $dado['id']?>'">Excluir</button>
                            <?php
                            } else {
                            ?>
                                <button value="<?= $dado['id'] ?>" onclick="window.location.href='<?= URL ?>sistema/excluir/<?= $dados['lista'] ?>/<?= $dado['id'] ?>/<?= $dado['img'] ?>'" class="btn-excluir">Excluir</button>
                            <?php
                            }
                            ?>

                        </td>
                    </tr>
                <?php
                } ?>
            </table>
        </div>
    </div>

    <div class="cadastrar-item">
        <div class="formulario">
            <h1>Cadastro</h1>
            <form action="<?= URL ?>sistema/cadastrar/<?= $dados['lista'] ?>" method="post">
                <?php
                foreach ($dados['colunas'] as $coluna) {
                    if ($coluna == 'status') {
                        continue;
                    }
                    if ($coluna == 'img') {
                ?>
                        <input type="file" name="image" class="image inp" id="upload_image" style="display: none;" />
                    <?php
                        continue;
                    }
                    ?>
                    <label for="<?= $coluna ?>"><?= ucfirst($coluna) ?></label>
                    <input class="inp" type="text" name="<?= $coluna ?>" id="<?= $coluna ?>">
                <?php
                }
                ?>
                <select name="status" class="inp" id="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
                <?php
                if ($dados['lista'] == 'grupos') {
                ?>
                    <button type="button" onclick="cadastrarGrupo()">Cadastrar Grupo</button>
                <?php
                } else {
                ?>
                    <button type="button" onclick="document.getElementById('upload_image').click()">Cadastrar Imagem</button>
                <?php
                }
                ?>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Defina a imagem para seu produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<style>
    .header {
        height: 3vh;
        background: #123c5a;
    }

    .menu-sys img {
        width: 100%;
    }

    .menu-sys {
        height: 97vh;
        width: 20%;
        background: #152a38;
        color: white;
    }

    a {
        color: white;
    }

    a:hover {
        text-decoration: none;
        color: white;
    }

    .conteudo {
        display: flex;
    }

    li {
        list-style: none;
        padding: 15px;
        font-size: 16pt;
    }

    .itens-lista {
        width: 50%;
        color: black;
        padding: 15px;
        background: rgb(128 128 128 / 30%);
    }

    table {
        width: 100%;
    }

    th,
    td {
        padding: 10px;
    }

    tr {
        border: solid 1px rgb(58 80 189 / 40%);
    }


    .lista {
        height: 100%;
    }

    .formulario {
        padding: 15px;
    }

    .cadastrar-item {
        width: 30%;
    }

    li:hover {
        background: blue;
    }

    h3 {
        padding-left: 1rem;
    }

    ul {
        padding-left: 0;
    }

    li {
        padding-left: 2.5rem;
    }

    .formulario form {
        width: 80%;
        margin: auto;
    }

    .formulario input,
    .formulario button,
    .formulario select {
        width: 100%;
        margin-bottom: 10px;
        font-size: 16pt;
    }

    .lista img {
        max-height: 50px;
    }

    h1 {
        text-align: center;
    }
</style>

<script>
    $(document).ready(function() {

        var $modal = $('#modal');

        var image = document.getElementById('sample_image');

        var cropper;

        $('#upload_image').change(function(event) {
            var files = event.target.files;

            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function() {
            formupost = {}
            document.querySelectorAll(".inp").forEach((item) => {
                formupost[item.name] = item.value
            })

            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    formupost['img'] = base64data
                    $.ajax({
                        url: '<?= URL ?>sistema/cadastrar/<?= $dados['lista'] ?>',
                        method: 'POST',
                        data: formupost,
                        success: function(data) {
                            $modal.modal('hide');
                            window.location.reload();
                        }
                    });
                };
            });
        });

    });

    function cadastrarGrupo() {
        formupost = {}
        document.querySelectorAll(".inp").forEach((item) => {
            formupost[item.name] = item.value
        })
        $.ajax({
            url: '<?= URL ?>sistema/cadastrarGrupo/<?= $dados['lista'] ?>',
            method: 'POST',
            data: formupost,
            success: function(data) {
                window.location.reload();
            }
        });
    }
</script>