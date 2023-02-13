# kernel.php

Ajout des méthodes qui vont allez lire les éléments de notre composants pour les gérer comme des services.

# Components/Trace

Notre composant.

* DependencyInjection contient les fichiers permettant de dire quoi ajouter.

  * Le TraceCompilerPass.php va permettre de dire à Symfony de lire les fichiers de configuration et de les ajouter au container.

  * Le fichier services.php va permettre de dire à Symfony de charger les différents éléments de notre composants (ici les types de traces). On pourrait aussi définir une couche de configuration dans le cadre d'un bundle indépendant.
* TraceRegistry.php va c'est le point d'entrée, et c'est lui qui est appelé dans le Kernel.php pour ajouter les éléments au container, mais aussi dans le service pour ajouter les types. On va ainsi avoir un point d'entré dans le reste de notre programme pour accéder au composant.
* TypeTrace

Tous nos types de traces. 

AbstractTypeTrace.php est la classe mère de tous nos types de traces. Elle contient les méthodes de base pour les types de traces. On peut aussi y ajouter des méthodes communes à tous les types de traces.

TraceInterface.php est l'interface que doivent implémenter tous nos types de traces. Elle contient les méthodes que doit implémenter un type de trace.

# Controllers

* TestTraceController contient deux méthodes d'exemple.
* Index récupère toutes les traces, et affiche une liste. On peut accéder à chaque type par son "nom" "Fully Qualified Class Name" (FQCN). Autrement dit son namespace complet. C'est ce qu'on stocke dans le tableau du fichier TraceRegistry.php.

```php
 public function registerTypeTrace(string $name, AbstractTrace $abstractTrace): void
    {
        $this->typeTraces[$name] = $abstractTrace;
    }
```

La méthode show, récupère le type en question et affiche un texte spécifique.

Ce qui est intéressant à noter c'est que tout le code du contrôleur n'a pas besoin de savoir de quel type on parle, il fonctionnera toujours.

Avec ce système on pourrait ajouter facilement des types. Ils seraient automatiquement pris en compte.
