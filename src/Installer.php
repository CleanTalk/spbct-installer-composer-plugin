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
        return $packageType === 'cleantalk-spbct-lib';
    }

    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $name = explode('/', $package->getName());
        $name = end($name);
        $name = explode('-', $name);
        $name_processed = [];
        foreach ( $name as $name_item ) {
            $name_processed[] = ucfirst($name_item);
        }
        return "lib/CleantalkSP/Common/" . implode('', $name_processed);
    }

}