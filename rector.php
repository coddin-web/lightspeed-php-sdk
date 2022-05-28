<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\EarlyReturn\Rector\If_\ChangeOrIfReturnToEarlyReturnRector;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Php81\Rector\ClassConst\FinalizePublicClassConstantRector;
use Rector\Privatization\Rector\Class_\FinalizeClassesWithoutChildrenRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictTypedCallRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictTypedPropertyRector;
use Rector\TypeDeclaration\Rector\FunctionLike\ParamTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\FunctionLike\ReturnTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\Param\ParamTypeFromStrictTypedPropertyRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/src/ApiResource',
    ]);

    // Generic
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    $rectorConfig->rule(FinalizeClassesWithoutChildrenRector::class);
    $rectorConfig->rule(TypedPropertyFromAssignsRector::class);
    $rectorConfig->rule(ChangeOrIfReturnToEarlyReturnRector::class);

    $rectorConfig->rule(ParamTypeDeclarationRector::class);
    $rectorConfig->rule(ParamTypeFromStrictTypedPropertyRector::class);

    $rectorConfig->rule(ReturnTypeDeclarationRector::class);
    $rectorConfig->rule(ReturnTypeFromStrictTypedCallRector::class);
    $rectorConfig->rule(ReturnTypeFromStrictTypedPropertyRector::class);

    // PHP 7.4 specific
    $rectorConfig->rule(ClosureToArrowFunctionRector::class);
    $rectorConfig->ruleWithConfiguration(TypedPropertyRector::class, [
        TypedPropertyRector::INLINE_PUBLIC => true,
    ]);

    // PHP 8.1 specific
    $rectorConfig->rule(FinalizePublicClassConstantRector::class);

    $rectorConfig->importNames();

    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_81,
    ]);
};
