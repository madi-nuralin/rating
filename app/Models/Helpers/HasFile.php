<?php

namespace App\Models\Helpers;

use Illuminate\Support\Facades\Storage;

trait HasFile {

    public function getFile($locale=null) {
        return $this->getFileUrl('');
    }

    public function setFile($file, $locale=null) {
        $this->updateFile('file', $file, 'form-files');
    }

	/**
     * Update the module's configuration file.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @return void
     */
    public function updateFile($settingName, $file, $publicly)
    {
        tap(function ($previous) use ($file, $publicly) {
            $this->setSetting(
                $settingName, 
                $file->storePublicly($publicly, ['disk' => $this->fileDisk()]),
                null //isset($locale) ? $locale : app()->currentLocale()
            );

            if ($previous) {
                Storage::disk($this->fileDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the module's configuration file.
     *
     * @return void
     */
    public function deleteFile()
    {
        Storage::disk($this->fileDisk())->delete($this->getSetting('file', null));

        $this->setSetting(
            'file',
            null,
            null //isset($locale) ? $locale : app()->currentLocale()
        );
    }

    /**
     * Get the URL to the module's configuration file.
     *
     * @return string
     */
    public function getFileUrlAttribute($defaultUrl)
    {
        return $this->getSetting('file', null)
                    ? Storage::disk($this->fileDisk())->url($this->getSetting('file', null))
                    : $this->defaultFileUrl($defaultUrl);
    }

    /**
     * Get the content to the module's configuration file.
     *
     * @return string
     */
    public function getFileGetAttribute($defaultUrl)
    {
        return $$this->getSetting('file', null)
                    ? Storage::disk($this->fileDisk())->get($this->getSetting('file', null))
                    : $this->defaultFileUrl($defaultUrl);
    }

    /**
     * Get the URL to the module's configuration file.
     *
     * @return string
     */
    public function getFileUrl($defaultUrl)
    {
        return $this->getSetting('file', null)
                    ? Storage::url($this->getSetting('file', null))
                    : $this->defaultFileUrl($defaultUrl);
    }

    /**
     * Get the disk that configuration files should be stored on.
     *
     * @return string
     */
    protected function fileDisk()
    {
        return 'public';//isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.configuration_file_disk', 'public');
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultFileUrl($url)
    {
        return $url;
    }
}