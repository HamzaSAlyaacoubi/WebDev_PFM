<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Center - Réservation</title>
</head>
<body>
    <section>

        <h1>Demande de réservation</h1>
    
        <form method="POST">
    
            <fieldset>
                <legend>Ressource</legend>
    
                <div>
                    <label>Name :</label>
                    <!-- values importer du ressource choisie -->
                    <input type="text" value="{{ $ressource->name }}" readonly>
                </div>
    
                <div>
                    <label>Manufacturer :</label>
                    <input type="text" value="{{ $ressource->manufacturer }}" readonly>
                </div>
    
                <div>
                    <label>Caractéristiques :</label>
                    <textarea readonly><!-- info importer aussi du ressource choisie --></textarea>
                </div>
            </fieldset>
    
            <fieldset>
                <legend>Période de réservation</legend>
    
                <div>
                    <label>Date de début :</label>
                    <input type="date" name="date_debut" required>
                </div>
    
                <div>
                    <label>Date de fin :</label>
                    <input type="date" name="date_fin" required>
                </div>
            </fieldset>
    
            <fieldset>
                <legend>Justification :</legend>
    
                <div>
                    <textarea name="justification" rows="4" cols="50" placeholder="Expliquez la raison de votre demande..." required></textarea>
                </div>
            </fieldset>
    
            <button type="submit">Confirmer</button>
        </form>

    </section>
</body>
</html>