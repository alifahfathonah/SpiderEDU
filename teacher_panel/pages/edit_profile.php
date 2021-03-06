<?php
$id = $_SESSION['t_uid'];
$query = getTeacherDataById($id);
?>
<script type="text/javascript">
    $(function () {
        $("#submit").click(function () {
            var ajax_function = "edit_teacher_profile";
            var id = "<?php echo $id;?>";
            var full_name = $("input[name=full_name]").val();
            var password = $("input[name=password]").val();
            var education = $("input[name=education]").val();
            var job_place = $("input[name=job_place]").val();
            var telephone = $("input[name=telephone]").val();
            var email = $("input[name=email]").val();
            var skype = $("input[name=skype]").val();
            var telegram = $("input[name=telegram]").val();
            var address = $("input[name=address]").val();
            $.ajax({
                url: '../resources/system/ajax_functions.php',
                type: "POST",
                data: {
                    ajax_function: ajax_function,
                    id: id,
                    full_name: full_name,
                    password:password,
                    education: education,
                    job_place: job_place,
                    telephone: telephone,
                    email: email,
                    skype: skype,
                    telegram: telegram,
                    address: address
                },
                success: function (data) {
                    if (data == "ERROR") {
                        swal({
                            title: "Помилка",
                            text: "Інформацію не змінено",
                            type: "error",
                        });
                    } else if (data == "OK") {
                        swal({
                            title: "Успіх",
                            text: "Інформацію успішно змінено",
                            type: "success",
                        });
                    } else {
                        swal({
                            title: "Hacking attempt!",
                            type: "error",
                        });
                    }
                }
            });
        });
    });
</script>
<div class="panel panel-white">
    <div class="panel-heading">
        <h6 class="panel-title">Редагування викладача/IT-професіонала</h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <fieldset class="content-group">
            <div class="row">

                <div class="col-md-12">
                    <?php while ($teacher = mysqli_fetch_array($query)){ ?>
                    <div class="form-group">
                        <label class="control-label">ПІБ</label>
                        <input type="text" name="full_name" class="form-control"
                               value="<?php echo $teacher['full_name'] ?>"
                               placeholder="ПІБ"/>
                        <label class="control-label">Пароль</label>
                        <input type="password" name="password" class="form-control" value=""
                               placeholder="Заповніть якщо хочете змінити пароль"/>
                        <label class="control-label">Освіта</label>
                        <input type="text" name="education" class="form-control"
                               value="<?php echo $teacher['education'] ?>"
                               placeholder="Освіта"/>
                        <label class="control-label">Місце роботи</label>
                        <input type="text" name="job_place" class="form-control"
                               value="<?php echo htmlspecialchars($teacher['job_place']); ?>"
                               placeholder="Місце роботи"/>
                        <label class="control-label">Телефон в міжнародному форматі (без "+")</label>
                        <input type="text" name="telephone" class="form-control"
                               value="<?php echo $teacher['telephone'] ?>"
                               placeholder="Телефон"/>
                        <label class="control-label">E-Mail</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $teacher['email'] ?>"
                               placeholder="E-Mail"/>
                        <label class="control-label">Skype</label>
                        <input type="text" name="skype" class="form-control" value="<?php echo $teacher['skype'] ?>"
                               placeholder="Skype"/>
                        <label class="control-label">Telegram</label>
                        <input type="text" name="telegram" class="form-control"
                               value="<?php echo $teacher['telegram'] ?>"
                               placeholder="Telegram"/>
                        <label class="control-label">Адреса</label>
                        <input type="text" name="address" class="form-control"
                               value="<?php echo $teacher['address'] ?>"
                               placeholder="Адреса"/>
                        <label class="control-label">Статус</label><br/>
                        <input type="text" class="form-control" name="status" value="<?php if ($teacher['status'] == 'teacher') {
                            echo "Викладач";
                        } else if ($teacher['status'] == 'it_professional') {
                            echo "IT-Професіонал";
                        } ?>" disabled/>
                            <?php } ?>
                        </div>
                        <button type="button" id="submit" class="btn btn-primary btn-block">Зберегти</button>
                    </div>
                </div>
        </fieldset>
    </div>
</div>