<?php

namespace Cleantalk\SpbctInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class Installer extends LibraryInstaller
{
    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return $packageType === 'cleantalk-spbct-lib' || $packageType === 'cleantalk-spbct-scanner';
    }

    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $name = explode('/', $package->getName());
        $name = end($name);
        $name = str_replace('spbct-', '', $name);
        $name = explode('-', $name);
        $name_processed = [];
        foreach ( $name as $name_item ) {
            $name_processed[] = ucfirst($name_item);
        }
        $path = "lib/CleantalkSP/Common/";
        if ( $package->getType() === 'cleantalk-spbct-scanner' ) {
            $path .= 'Scanner/';
        }
        return $path . implode('', $name_processed);
    }

}