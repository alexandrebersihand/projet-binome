<?php

namespace App\Security\Voter;

use App\Entity\Definition;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class DefinitionVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
            return in_array($attribute, ['ARTICLE_EDIT'])
            && $subject instanceof Definition;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUsername();
        // if the user is anonymous, do not grant access
       if (!$user instanceof UserInterface) {
            dump($user);
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'ARTICLE_EDIT':
                // logic to determine if the user can EDIT
                // return true or false
                return $user == $subject->getAuthor()->getUsername();
                break;
        }

        return false;
    }
}
