<?php
// formulaire

$envoyer = FALSE;
$erreur[] = FALSE;

if ( !empty( $_POST['submit'] ) ) {

    if ( !empty( $_POST['nom'] ) ) {

        $nom = htmlentities( $_POST['nom'] );
        $erreur['nom'] = FALSE;

    } else {

        $erreur['nom'] = TRUE;

    }

    if ( !empty( $_POST['captcha'] ) ) {

        if ( $_POST['captcha'] == 4 ) :

            $erreur['captcha'] = FALSE;

        else :

            $erreur['captcha'] = TRUE;

        endif;

    } else {

        $erreur['captcha'] = TRUE;
    }


    if ( !empty( $_POST['mail'] ) ) {

        $Syntaxe =  "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)" .
                    "|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}" .
                    "|[0-9]{1,3})(\]?)$/";

        if ( preg_match( $Syntaxe, $_POST['mail'] ) ) {

            $mail = $_POST['mail'];
            $erreur['mail1'] = FALSE;
            $erreur['mail2'] = FALSE;

        } else {

            $erreur['mail2'] = TRUE;

        }

    } else {

        $erreur['mail1'] = TRUE;

    }

    if ( !empty( $_POST['msg'] ) ) {

        $msg = htmlentities( $_POST['msg'] );
        $erreur['msg'] = FALSE;

    } else {

        $erreur['msg'] = TRUE;

    }
}

// fonction mail

if ( !empty( $nom ) && !empty( $mail ) && !empty( $msg ) && $erreur['captcha'] == FALSE ) {

    $destinataire = 'mickael.dusaiwoir@student.hepl.be';
    $sujet = 'Titre du message';
    $contenu = '<html><head><title>Titre du message</title></head><body>';
    $contenu .= '<p>Bonjour, vous avez reçu un message de votre site web (Magic of design - Portfolio ).</p>';
    $contenu .= '<p><strong>Nom</strong>: ' . $nom . '</p>';
    $contenu .= '<p><strong>Email</strong>: ' . $mail . '</p>';
    $contenu .= '<p><strong>Message</strong>: ' . $msg . '</p>';
    $contenu .= '</body></html>';
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: ' . $mail . "\r\n";
    mail( $destinataire, $sujet, $contenu, $headers );
    $envoyer = TRUE;

} else {

    $envoyer = FALSE;

}

if ( $envoyer == TRUE ) : ?>

    <p id="envoyer">Votre message &agrave; bien &eacute;t&eacute; envoy&eacute</p>

<?php endif; ?>

<form method="post" action="#contact">

    <a name="formulaire"></a>

    <fieldset id="left" >

        <label for="Nom"> 
            Nom et Prénom 
        </label>

        <input type="text" id="nom" placeholder="Ex : Mickael Dusaiwoir" name="nom" <?php
if ( isset( $nom ) ) {
    echo('value="' . $nom . '"');
}
?>/>
            <?php if ( $erreur['nom'] == TRUE ): ?>

                <p class="erreur">Entrez votre Nom et pr&eacute;nom</p>

            <?php endif; ?>

        <label for="mail">
            Adresse Email
        </label>

        <input type="email" id="mail" placeholder="Ex : xyz@exemple.com" name="mail" <?php
        if ( isset( $mail ) ) {
            echo 'value="' . $mail . '"';
        }
        ?>/>
               <?php
               if ( $erreur['mail1'] == TRUE || $erreur['mail2'] ) :

                   if ( $erreur['mail2'] == TRUE ) : ?>

                        <p class="erreur">Entrez une adresse email valide</p>

            <?php else : ?>

                    <p class="erreur">Entrez votre adresse email</p>
            <?php
                endif;

            endif;
        ?>

        <label for="captcha"> 
            <?php _e('Combien fait'); ?> 2 + 2&nbsp;? 
        </label>

        <input type="number" id="captcha" placeholder="Ex: 10" name="captcha" min="0" max="10" />

        <?php if ( $erreur['captcha'] == TRUE ): ?>

            <p class="erreur"><?php _e('R&eacute;solvez ce calcul'); ?> </p>

        <?php endif; ?>

    </fieldset>

    <fieldset id="right" >

        <label for="msg">
            Message
        </label>

        <textarea id="msg" rows="4" cols="58" placeholder="Que souhaitez vous me dire !!" name="msg"><?php
        if ( isset( $msg ) ) {
            echo ($msg);
        }
        ?></textarea>

        <?php if ( $erreur['msg'] == TRUE ): ?>

            <p class="erreur">Entrez votre message</p>

        <?php endif; ?>

        <input type="submit" name="submit" value="Je te contact" /> 

    </fieldset>

</form>