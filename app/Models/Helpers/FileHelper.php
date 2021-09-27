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
    public function updateFile($file, $filePath, $publicly)
    {
        tap($filePath, function ($previous) use ($file) {
            $this->forceFill([
                $filePath => $file->storePublicly(
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
    public function deleteFile($filePath, $filePath_var_name)
    {
        /*if (! Features::managesConfigurationFiles()) {
            return;
        }*/

        Storage::disk($this->fileDisk())->delete($filePath);

        $this->forceFill([
            $filePath_var_name => null,
        ])->save();
    }

    /**
     * Get the URL to the module's configuration file.
     *
     * @return string
     */
    public function getFileUrlAttribute($filePath, $default_url)
    {
        return $filePath
                    ? Storage::disk($this->fileDisk())->url($filePath)
                    : $this->defaultFileUrl($default_url);
    }

    /**
     * Get the content to the module's configuration file.
     *
     * @return string
     */
    public function getFileGetAttribute($filePath)
    {
        return $filePath
                    ? Storage::disk($this->fileDisk())->get($filePath)
                    : $this->defaultFileUrl($default_url);
    }

    /**
     * Get the URL to the module's configuration file.
     *
     * @return string
     */
    public function getFileUrl($filePath, $default_url)
    {
        return $filePath
                    ? Storage::url($filePath)
                    : $this->defaultFileUrl($default_url);
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