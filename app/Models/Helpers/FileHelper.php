<?php

namespace App\Models\Helpers;

use Illuminate\Support\Facades\Storage;

trait FileHelper {

	/**
     * Update the module's configuration file.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @return void
     */
    public function updateFile($file, $fileVariable, $fileVariableName, $publicly)
    {
        tap($this->{$fileVariable}, function ($previous) use ($file, $fileVariableName, $publicly) {
            $this->forceFill([
                $fileVariableName => $file->storePublicly(
                    $publicly, ['disk' => $this->fileDisk()]
                ),
            ])->save();

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
    public function deleteFile($fileVariable, $fileVariableName)
    {
        /*if (! Features::managesConfigurationFiles()) {
            return;
        }*/

        Storage::disk($this->fileDisk())->delete($fileVariable);

        $this->forceFill([
            $fileVariableName => null,
        ])->save();
    }

    /**
     * Get the URL to the module's configuration file.
     *
     * @return string
     */
    public function getFileUrlAttribute($fileVariable, $defaultUrl)
    {
        return $fileVariable
                    ? Storage::disk($this->fileDisk())->url($fileVariable)
                    : $this->defaultFileUrl($defaultUrl);
    }

    /**
     * Get the content to the module's configuration file.
     *
     * @return string
     */
    public function getFileGetAttribute($fileVariable, $defaultUrl)
    {
        return $fileVariable
                    ? Storage::disk($this->fileDisk())->get($fileVariable)
                    : $this->defaultFileUrl($defaultUrl);
    }

    /**
     * Get the URL to the module's configuration file.
     *
     * @return string
     */
    public function getFileUrl($fileVariable, $defaultUrl)
    {
        return $fileVariable
                    ? Storage::url($fileVariable)
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