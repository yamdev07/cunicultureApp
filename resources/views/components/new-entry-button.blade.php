<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class NewEntryButton extends Component
{
    public $route;
    public $label;

    /**
     * Create a new component instance.
     *
     * @param string $route La route vers le formulaire de création
     * @param string|null $label Le texte du bouton (optionnel)
     */
    public function __construct($route, $label = null)
    {
        $this->route = $route;

        // Si aucun label n’est fourni, on le génère automatiquement
        if ($label) {
            $this->label = $label;
        } else {
            // On récupère le nom de l’entité à partir de la route
            $parts = explode('.', $route); // ex: males.create → ['males','create']
            $entity = Str::ucfirst(Str::singular($parts[0])); // 'Males' → 'Male'
            $this->label = "Nouvelle $entity";
        }
    }

    public function render()
    {
        return view('components.new-entry-button');
    }
}
