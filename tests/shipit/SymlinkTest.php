 * Copyright (c) Facebook, Inc. and its affiliates.
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

/**
 * This file was moved from fbsource to www. View old history in diffusion:
 * https://fburl.com/vfbtaguj

<<\Oncalls('open_source')>>
  ): dict<string, (
    return dict[
          ImmVector {'git', 'init'},
          ImmVector {'touch', 'foo'},
          ImmVector {'git', 'add', 'foo'},
          ImmVector {'git', 'commit', '-m', 'add file'},
          ImmVector {'git', 'rm', 'foo'},
          ImmVector {'ln', '-s', 'bar', 'foo'},
          ImmVector {'git', 'add', 'foo'},
          ImmVector {'git', 'commit', '-m', 'add symlink'},
          ImmVector {'hg', 'init'},
          ImmVector {'touch', 'foo'},
          ImmVector {'hg', 'commit', '-Am', 'add file'},
          ImmVector {'hg', 'rm', 'foo'},
          ImmVector {'ln', '-s', 'bar', 'foo'},
          ImmVector {'hg', 'commit', '-Am', 'add symlink'},
          ImmVector {'git', 'init'},
          ImmVector {'ln', '-s', 'bar', 'foo'},
          ImmVector {'git', 'add', 'foo'},
          ImmVector {'git', 'commit', '-m', 'add symlink'},
          ImmVector {'git', 'rm', 'foo'},
          ImmVector {'touch', 'foo'},
          ImmVector {'git', 'add', 'foo'},
          ImmVector {'git', 'commit', '-m', 'add file'},
          ImmVector {'hg', 'init'},
          ImmVector {'ln', '-s', 'bar', 'foo'},
          ImmVector {'hg', 'commit', '-Am', 'add symlink'},
          ImmVector {'hg', 'rm', 'foo'},
          ImmVector {'touch', 'foo'},
          ImmVector {'hg', 'commit', '-Am', 'add file'},
  <<\DataProvider('getFileToFromSymlinkExamples')>>
    $repo = ShipItRepo::typedOpen($repo_type, $temp_dir->getPath(), 'master');
    $changeset = \expect($changeset)->toNotBeNull();
    \expect($changeset->isValid())->toBeTrue();
    \expect($changeset->getDiffs()->count())->toBePHPEqual(
    \expect($changeset->getDiffs()->map($diff ==> $diff['path']))->toBePHPEqual(
      ImmVector {'foo', 'foo'},
    \expect($delete_file['body'])->toContainSubstring((string)$first_op);
    \expect($create_symlink['body'])->toContainSubstring((string)$second_op);